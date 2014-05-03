<?php

/**
 * Twig Callable Bridge Bundle
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Twig Callable Bridge Bundle
 */
class CovexTwigCallableBridgeBundle extends Bundle
{


  /**
   * {@inheritdoc}
   */
  public function build(ContainerBuilder $container)
  {
    $container->addCompilerPass(
      new DependencyInjection\Compiler\ActionPass()
    );
  }
}
