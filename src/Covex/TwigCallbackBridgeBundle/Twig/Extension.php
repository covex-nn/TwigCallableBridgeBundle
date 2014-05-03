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
   * Add callback
   *
   * @param CallbackInterface $callback Callback
   *
   * @return null
   * @throws \Twig_Error
   */
  public function addCallback(CallbackInterface $callback)
  {
    $name = $callback->getName();
    $value = $callback->getValue();
    $type = $callback->getType();

    switch ($type) {
      case CallbackInterface::CALLBACK_FUNCTION:
        $this->functions[] = new \Twig_SimpleFunction($name, $value);
        break;
      case CallbackInterface::CALLBACK_FILTER:
        $this->filters[] = new \Twig_SimpleFilter($name, $value);
        break;
      case CallbackInterface::CALLBACK_TEST:
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
    return "covex_twig_callback_bridge";
  }
}
