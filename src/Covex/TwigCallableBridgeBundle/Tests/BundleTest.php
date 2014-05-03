<?php

/**
 * Functional test
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Covex\TwigCallableBridgeBundle\Tests;

use Apnet\FunctionalTestBundle\Framework\WebTestCase;

/**
 * Functional test
 */
class BundleTest extends WebTestCase
{

  /**
   * Test file_get_contents function
   *
   * @return null
   */
  public function testStaticCollection()
  {
    $client = self::createClient();

    $result = $client->getContainer()
      ->get('twig')->render("::index.html.twig");

    $this->assertTrue(is_string($result));
  }
}
