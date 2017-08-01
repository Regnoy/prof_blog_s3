<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 8/1/2017
 * Time: 8:06 AM
 */

namespace CoreBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class CoreExtension extends Extension
{

  public function load(array $configs, ContainerBuilder $container)
  {
    $loader = new YamlFileLoader( $container, new FileLocator(__DIR__.'/../Resources/config') );
    $loader->load('services.yml');
  }
}