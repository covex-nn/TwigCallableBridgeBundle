<?php

/**
 * Adds services tagged as action to twig extension
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Adds services tagged as action to twig extension
 */
class ActionPass implements CompilerPassInterface
{

  /**
   * {@inheritdoc}
   */
  public function process(ContainerBuilder $container)
  {
    $collection = $container->getDefinition("covex.twig_callable_bridge.twig_extension");

    $functions = $container->findTaggedServiceIds("twig.callable_bridge");
    foreach ($functions as $id => $tagAttributes) {
      $collection->addMethodCall("addAction", array(new Reference($id)));
    }
  }
}
