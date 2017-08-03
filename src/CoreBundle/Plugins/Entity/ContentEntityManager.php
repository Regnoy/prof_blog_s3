<?php


namespace CoreBundle\Plugins\Entity;

use CoreBundle\Plugins\Utils\SchemaReader;

class ContentEntityManager {

  private $schemaReader;

  public function __construct( SchemaReader $schemaReader ) {
    $this->schemaReader = $schemaReader;
  }

  public function getType( $machine_name ){
    $schema = $this->schemaReader->getSchema();
    return $schema[$machine_name]['type'];
  }
}