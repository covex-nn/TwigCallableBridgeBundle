<?php

/**
 * Twig Callback Bridge Bundle
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallbackBridgeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Twig Callback Bridge Bundle
 */
class CovexTwigCallbackBridgeBundle extends Bundle
{


  /**
   * {@inheritdoc}
   */
  public function build(ContainerBuilder $container)
  {
    $container->addCompilerPass(
      new DependencyInjection\Compiler\CallbackPass()
    );
  }
}
