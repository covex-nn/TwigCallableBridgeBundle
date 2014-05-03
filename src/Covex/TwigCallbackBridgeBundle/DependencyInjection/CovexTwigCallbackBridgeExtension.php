<?php

/**
 * This is the class that loads and manages bundle configuration
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallbackBridgeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Covex\TwigCallbackBridgeBundle\Callback\CallbackInterface;

/**
 * This is the class that loads and manages bundle configuration
 */
class CovexTwigCallbackBridgeExtension extends Extension
{
  /**
   * {@inheritDoc}
   */
  public function load(array $configs, ContainerBuilder $container)
  {
    $configuration = new Configuration();
    $config = $this->processConfiguration($configuration, $configs);

    foreach ($config["functions"] as $name => $callback) {
      $this->addCallback($name, CallbackInterface::CALLBACK_FUNCTION, $callback, $container);
    }
    foreach ($config["filters"] as $name => $callback) {
      $this->addCallback($name, CallbackInterface::CALLBACK_FILTER, $callback, $container);
    }
    foreach ($config["tests"] as $name => $callback) {
      $this->addCallback($name, CallbackInterface::CALLBACK_TEST, $callback, $container);
    }

    $loader = new Loader\YamlFileLoader(
      $container, new FileLocator(__DIR__ . '/../Resources/config')
    );
    $loader->load('services.yml');
  }

  /**
   * Add callback
   *
   * @param string           $name      Name
   * @param string           $type      Type
   * @param callback         $callback  Callback
   * @param ContainerBuilder $container Container builder
   *
   * @return null
   */
  protected function addCallback($name, $type, $callback, ContainerBuilder $container)
  {
    $callbackDefinition = new DefinitionDecorator("covex.twig_callback.bridge_" . $type);

    $callbackDefinition->addMethodCall('setName', array($name));
    $callbackDefinition->addMethodCall('setValue', array($callback));
    $callbackDefinition->addTag("twig.callback_bridge");

    $container->setDefinition(
      "covex.twig_callback.bridge_" . $type . "." . md5(serialize($callback)),
      $callbackDefinition
    );
  }
}
