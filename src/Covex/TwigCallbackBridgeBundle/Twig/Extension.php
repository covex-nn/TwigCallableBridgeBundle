<?php

/**
 * Twig callback bridge extension
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallbackBridgeBundle\Twig;

use Covex\TwigCallbackBridgeBundle\Callback\CallbackInterface;

/**
 * Twig callback bridge extension
 */
class Extension extends \Twig_Extension
{

  /**
   * Add callback
   *
   * @param CallbackInterface $callback Callback
   *
   * @return null
   */
  public function addCallback(CallbackInterface $callback)
  {

  }

  /**
   * {@inheritdoc}
   */
  public function getName()
  {
    return "covex_twig_callback_bridge";
  }
}
