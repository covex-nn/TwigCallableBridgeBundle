<?php

/**
 * Callable action interface
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\Action;

/**
 * Callable action interface
 */
interface ActionInterface
{

  const ACTION_FUNCTION = "function";

  const ACTION_FILTER = "filter";

  const ACTION_TEST = "test";

  /**
   * Get action type
   *
   * @return mixed
   */
  public function getType();

  /**
   * Get action name
   *
   * @return string
   */
  public function getName();

  /**
   * Get action itself
   *
   * @return callback
   */
  public function getValue();
}
