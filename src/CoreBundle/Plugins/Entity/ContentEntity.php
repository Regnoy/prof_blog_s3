<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/31/2017
 * Time: 8:13 AM
 */

namespace CoreBundle\Plugins\Entity;


class ContentEntity implements ContentEntityInterface {

  public $id;//page

  public $type = [];

  public $tableData = [];


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