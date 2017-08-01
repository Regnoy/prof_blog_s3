<?php


namespace CoreBundle\Plugins\Entity;


use CoreBundle\Plugins\Utils\Common;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Yaml;

class ContentEntityManager {

  private $kernel;

  private $types = [];

  public function __construct( KernelInterface $kernel ) {
    $this->kernel = $kernel;
  }

  public function getType( $machine_name ){
    $bundles = $this->kernel->getBundles();
    $finder = new Finder();
    foreach ($bundles as $name => $bundle){
      try{
        $path = $this->kernel->locateResource('@'.$bundle->getName().'/Resources/schema');
      }catch (\Exception $e){
        continue;
      }
      $finder->files()->in($path);
      foreach ($finder as $file){
        $fileName = $file->getBasename('.yml');
        $schema = Yaml::parse(file_get_contents($path."/".$fileName.".yml"));
        $this->types[] = Common::convertArrayToSubArrays(explode('.',$fileName), $schema);
      }
    }
    $types = [];
    foreach($this->types as $type){
      if($type[$machine_name]['type']){
        $key = key($type[$machine_name]['type']);
        $types[$key] = $type[$machine_name]['type'][$key];
      }
    }
    return $types;
  }
}