<?php

/**
 * This is the class that validates and merges configuration
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration
 */
class Configuration implements ConfigurationInterface
{
  /**
   * {@inheritDoc}
   */
  public function getConfigTreeBuilder()
  {
    $treeBuilder = new TreeBuilder();
    $rootNode = $treeBuilder->root('covex_twig_callable_bridge');

    $callableValidator = function ($value) {
      return !is_callable($value);
    };
    $this->createExtensionNode($rootNode, 'functions', $callableValidator);
    $this->createExtensionNode($rootNode, 'filters', $callableValidator);
    $this->createExtensionNode($rootNode, 'tests', $callableValidator);

    return $treeBuilder;
  }

  /**
   * Create configuration section
   *
   * @param ArrayNodeDefinition $rootNode  Root node
   * @param string              $name      New configuration section name
   * @param callable            $validator Config value validator
   *
   * @return null
   */
  private function createExtensionNode(ArrayNodeDefinition $rootNode, $name, $validator)
  {
    $rootNode
      ->children()
      /**/->arrayNode($name)
      /*  */->addDefaultChildrenIfNoneSet(array())
      /*  */->requiresAtLeastOneElement()
      /*  */->useAttributeAsKey('name')
      /*  */->prototype('variable')
      /*    */->validate()
      /*      */->ifTrue($validator)
      /*      */->thenInvalid('Configuration value must be callable')
      /*    */->end()
      /*  */->end()
      /**/->end()
      ->end();
  }
}
