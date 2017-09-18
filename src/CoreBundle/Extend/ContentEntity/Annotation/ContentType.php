<?php

namespace CoreBundle\Extend\ContentEntity\Annotation;

/**
 * @Annotation
 * @Target("CLASS")
 */
class ContentType {

  public $id;//page

  public $type = [];

  public $tableData = [];


  public function id(){
    return $this->id;
  }

  public function getId(){
    return $this->id;
  }

  public function getType(){
    return $this->type;
  }

  public function tableData(){
    return $this->tableData;
  }
}