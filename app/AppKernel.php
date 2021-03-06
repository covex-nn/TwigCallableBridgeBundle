<?php

/**
 * Bundle test kernel
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Bundle test kernel
 */
// @codingStandardsIgnoreStart
class AppKernel extends Kernel
// @codingStandardsIgnoreEnd
{

  /**
   * {@inheritdoc}
   */
  public function registerBundles()
  {
    return array(
      new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
      new Symfony\Bundle\TwigBundle\TwigBundle(),
      new Symfony\Bundle\MonologBundle\MonologBundle(),

      new Covex\TwigCallableBridgeBundle\CovexTwigCallableBridgeBundle(),
      new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function registerContainerConfiguration(LoaderInterface $loader)
  {
    $loader->load(__DIR__ . "/config/config.yml");
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheDir()
  {
    return $this->rootDir.'/cache/'.$this->environment;
  }

  /**
   * {@inheritdoc}
   */
  public function getLogDir()
  {
    return $this->rootDir.'/logs';
  }
}
