<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/31/2017
 * Time: 8:53 AM
 */

namespace CoreBundle\Plugins\Entity;

use CoreBundle\Plugins\Core;
use CoreBundle\Plugins\Entity\Annotation\ContentEntity;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Form\Test\FormBuilderInterface;

class Entity {

  private $definition;

  public function getDefinition(){
    if(!$this->definition){
      $annotationReader = new AnnotationReader();
      $annotation = $annotationReader->getClassAnnotation( new \ReflectionClass(static::class), ContentEntity::class );
      if(!$annotation){
        throw new \Exception("Annotation not found");
      }
      $this->definition = $annotation;
    }
    return $this->definition;
  }

  public function getFieldDefinition(){
    $definition = $this->getDefinition();
    $fieldStorage = $this->getFieldStorage();
    $fields = [];
    $fieldData['data'] = $definition->tableData();
    $fields += $fieldData;
    $fields += $fieldStorage['fields'];
    return $fields;
  }
  public function getFieldConfig(){
    $fieldStorage = $this->getFieldStorage();
    return isset($fieldStorage['config']) ? $fieldStorage['config'] : null;
  }
  protected function getFieldStorage(){
    $definition = $this->getDefinition();
    return Core::$container->get('field.manager')->getDefinition($definition->id(),  $this->getType());
  }
  public function getType(){
    return null;
  }

  public function buildForm(FormBuilderInterface $builder, array $options){

    //for

  }

}