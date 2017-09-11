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
  public function getDefinitions( $machine_name ){
    $schema = $this->schemaReader->getSchema();
    return $schema['field_storage'][$machine_name];
  }
  public function getDefinition($machine_name, $type){
    $definition = $this->getDefinitions($machine_name);
    return $definition[$type];
  }
}