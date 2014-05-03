<?php

/**
 * Twig callable bridge extension
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\Twig;

use Covex\TwigCallableBridgeBundle\Action\ActionInterface;

/**
 * Twig callable bridge extension
 */
class Extension extends \Twig_Extension
{

  /**
   * @var array
   */
  private $functions = array();

  /**
   * @var array
   */
  private $filters = array();

  /**
   * @var array
   */
  private $tests = array();

  /**
   * Add callable
   *
   * @param ActionInterface $action Calleble action
   *
   * @return null
   * @throws \Twig_Error
   */
  public function addAction(ActionInterface $action)
  {
    $name = $action->getName();
    $value = $action->getValue();
    $type = $action->getType();

    switch ($type) {
      case ActionInterface::ACTION_FUNCTION:
        $this->functions[] = new \Twig_SimpleFunction($name, $value);
        break;
      case ActionInterface::ACTION_FILTER:
        $this->filters[] = new \Twig_SimpleFilter($name, $value);
        break;
      case ActionInterface::ACTION_TEST:
        $this->tests[] = new \Twig_SimpleTest($name, $value);
        break;
      default:
        throw new \Twig_Error("Unknown twig callable type ($type)");
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getFunctions()
  {
    return $this->functions;
  }

  /**
   * {@inheritdoc}
   */
  public function getFilters()
  {
    return $this->filters;
  }

  /**
   * {@inheritdoc}
   */
  public function getTests()
  {
    return $this->tests;
  }

  /**
   * {@inheritdoc}
   */
  public function getName()
  {
    return "covex_twig_callable_bridge";
  }
}
