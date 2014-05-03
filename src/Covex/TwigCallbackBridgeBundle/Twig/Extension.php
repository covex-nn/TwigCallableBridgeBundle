<?php

/**
 * Twig callback bridge extension
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallbackBridgeBundle\Twig;

/**
 * Twig callback bridge extension
 */
class Extension extends \Twig_Extension
{

  /**
   * {@inheritdoc}
   */
  public function getName()
  {
    return "covex_twig_callback_bridge";
  }
}
