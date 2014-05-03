<?php

/**
 * Adds services tagged as callback to twig extensions
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallbackBridgeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Adds services tagged as callback to twig extensions
 */
class CallbackPass implements CompilerPassInterface
{

  /**
   * {@inheritdoc}
   */
  public function process(ContainerBuilder $container)
  {
    $collection = $container->getDefinition("covex.twig_callback_bridge.twig_extension");

    $functions = $container->findTaggedServiceIds("twig.callback_bridge");
    foreach ($functions as $id => $tagAttributes) {
      $collection->addMethodCall("addCallback", array(new Reference($id)));
    }
  }
}
