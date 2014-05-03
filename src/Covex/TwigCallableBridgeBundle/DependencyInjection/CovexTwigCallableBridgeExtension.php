<?php

/**
 * This is the class that loads and manages bundle configuration
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Covex\TwigCallableBridgeBundle\Action\ActionInterface;

/**
 * This is the class that loads and manages bundle configuration
 */
class CovexTwigCallableBridgeExtension extends Extension
{
  /**
   * {@inheritDoc}
   */
  public function load(array $configs, ContainerBuilder $container)
  {
    $configuration = new Configuration();
    $config = $this->processConfiguration($configuration, $configs);

    foreach ($config["functions"] as $name => $action) {
      $this->defineAction($name, ActionInterface::ACTION_FUNCTION, $action, $container);
    }
    foreach ($config["filters"] as $name => $action) {
      $this->defineAction($name, ActionInterface::ACTION_FILTER, $action, $container);
    }
    foreach ($config["tests"] as $name => $action) {
      $this->defineAction($name, ActionInterface::ACTION_TEST, $action, $container);
    }

    $loader = new Loader\YamlFileLoader(
      $container, new FileLocator(__DIR__ . '/../Resources/config')
    );
    $loader->load('services.yml');
  }

  /**
   * Add callable
   *
   * @param string           $name      Name
   * @param string           $type      Type
   * @param callback         $action    Callable action
   * @param ContainerBuilder $container Container builder
   *
   * @return null
   */
  protected function defineAction($name, $type, $action, ContainerBuilder $container)
  {
    $definition = new DefinitionDecorator("covex.twig_callable.bridge_" . $type);

    $definition->addMethodCall('setName', array($name));
    $definition->addMethodCall('setValue', array($action));
    $definition->addTag("twig.callable_bridge");

    $container->setDefinition(
      "covex.twig_callable.bridge_" . $type . "." . md5(serialize($action)),
      $definition
    );
  }
}
