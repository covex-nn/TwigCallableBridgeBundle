<?php

/**
 * Twig callback class
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallbackBridgeBundle\Callback;

/**
 * Twig callback class
 */
class Callback implements CallbackInterface
{

  /**
   * @var string
   */
  private $type;

  /**
   * @var string
   */
  private $name;

  /**
   * @var callback
   */
  private $value;

  /**
   * Public constructor
   *
   * @param string   $type  Callback type
   * @param callback $value Callback itself
   */
  public function __construct($type, $value = null)
  {
    $this->type = $type;
    if (!is_null($value)) {
      $this->setValue($value);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set name
   *
   * @param string $name Name
   *
   * @return null
   */
  public function setName($name)
  {
    $this->name = $name;
  }

  /**
   * {@inheritdoc}
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set callback value
   *
   * @param callback $value Callback
   *
   * @return null
   */
  public function setValue($value)
  {
    $this->value = $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getValue()
  {
    return $this->value;
  }
}
