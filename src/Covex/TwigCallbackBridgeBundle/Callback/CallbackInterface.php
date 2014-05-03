<?php

/**
 * Twig callback interface
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallbackBridgeBundle\Callback;

/**
 * Twig callback interface
 */
interface CallbackInterface
{

  const CALLBACK_FUNCTION = "function";

  const CALLBACK_FILTER = "filter";

  const CALLBACK_TEST = "test";

  /**
   * Get type callback type
   *
   * @return mixed
   */
  public function getType();

  /**
   * Get callback name
   *
   * @return string
   */
  public function getName();

  /**
   * Get callback value
   *
   * @return callback
   */
  public function getValue();
}
