<?php


namespace CoreBundle\Plugins\Entity;

use CoreBundle\Plugins\Utils\SchemaReader;

class EntityManager {

  private $schemaReader;



  public function __construct( SchemaReader $schemaReader ) {
    $this->schemaReader = $schemaReader;
  }

  public function instance(){

  }

  public function getType( $machine_name ){
    $schema = $this->schemaReader->getSchema();
    return $schema['entity_content'][$machine_name];
  }
}