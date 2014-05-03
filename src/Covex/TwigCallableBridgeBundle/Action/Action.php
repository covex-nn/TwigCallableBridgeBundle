<?php

/**
 * Twig callable action class
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\Action;

/**
 * Twig callable action class
 */
class Action implements ActionInterface
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
   * @param string   $type  Type
   * @param callback $value Action itself
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
   * Set action value
   *
   * @param callback $value Callable action
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
