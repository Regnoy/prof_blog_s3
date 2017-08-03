<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 8/3/2017
 * Time: 8:20 AM
 */

namespace CoreBundle\Plugins\Fields;


use CoreBundle\Plugins\Utils\SchemaReader;

class FieldManager {

  private $schemaReader;

  public function __construct( SchemaReader $schemaReader ) {
    $this->schemaReader = $schemaReader;
  }
  public function getFieldDefinitions( $machine_name ){
    $schema = $this->schemaReader->getSchema();
    return $schema[$machine_name]['fields'];
  }
  public function getFieldDefinition($machine_name, $type){
    $definition = $this->getFieldDefinitions($machine_name);
    return $definition[$type];
  }
}