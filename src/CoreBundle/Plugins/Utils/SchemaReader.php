<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 8/3/2017
 * Time: 7:59 AM
 */

namespace CoreBundle\Plugins\Utils;


use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Yaml;

class SchemaReader {

  private $kernel;

  private $schema;

  public function __construct( KernelInterface $kernel ) {
    $this->kernel = $kernel;
  }

  public function getSchema(){
    if(!$this->schema){
      $this->schema = [];
      $this->discovery();
    }
    return $this->schema;
  }

  protected function discovery(){
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
        $convertedArray = Common::convertArrayToSubArrays(explode('.',$fileName), $schema);
        $this->schema = array_merge_recursive($this->schema, $convertedArray);
      }
    }
  }

}