<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/31/2017
 * Time: 8:53 AM
 */

namespace CoreBundle\Plugins\Entity;

use CoreBundle\Plugins\Entity\Annotation\ContentEntityView;
use Doctrine\Common\Annotations\AnnotationReader;

class EntityView {

  private $definition;


  public function getDefinition(){
    if(!$this->definition){
      $annotationReader = new AnnotationReader();
      $annotation = $annotationReader->getClassAnnotation( new \ReflectionClass(static::class), ContentEntityView::class );
      if(!$annotation){
        throw new \Exception("Annotation not found");
      }
      $this->definition = $annotation;
    }
    return $this->definition;
  }

}