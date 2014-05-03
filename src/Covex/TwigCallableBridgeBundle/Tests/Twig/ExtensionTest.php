<?php

/**
 * Test twig extension
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\Tests\Twig;

use Covex\TwigCallableBridgeBundle\Twig\Extension;
use Covex\TwigCallableBridgeBundle\Action;

/**
 * Test twig extension
 */
class ExtensionTest extends \Twig_Test_IntegrationTestCase
{

  /**
   * {@inheritdoc}
   */
  public function getExtensions()
  {
    $extension = new Extension();

    $function = new Action\Action(Action\ActionInterface::ACTION_FUNCTION);
    $function->setName("simpleFunction");
    $function->setValue(
      function ($param) {
        return "($param)";
      }
    );
    $extension->addAction($function);

    $filter = new Action\Action(Action\ActionInterface::ACTION_FILTER);
    $filter->setName("simpleFilter");
    $filter->setValue(
      function ($param) {
        return "[$param]";
      }
    );
    $extension->addAction($filter);

    $test = new Action\Action(Action\ActionInterface::ACTION_TEST);
    $test->setName("simpleTest");
    $test->setValue(
      function ($param) {
        if (substr($param, 0, 1) == "(" && substr($param, -1, 1) == ")") {
          $result = true;
        } elseif (substr($param, 0, 1) == "[" && substr($param, -1, 1) == "]") {
          $result = true;
        } else {
          $result = false;
        }
        return $result;
      }
    );
    $extension->addAction($test);

    return array($extension);
  }

  /**
   * {@inheritdoc}
   */
  public function getFixturesDir()
  {
    return __DIR__ . "/Fixtures";
  }
}
