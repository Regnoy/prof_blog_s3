<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 8/3/2017
 * Time: 8:21 AM
 */

namespace CoreBundle\Plugins\Fields;


class FieldStorageBase {
  public $id;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

}