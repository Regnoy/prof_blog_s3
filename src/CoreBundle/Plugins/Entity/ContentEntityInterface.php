<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 7/31/2017
 * Time: 8:13 AM
 */

namespace CoreBundle\Plugins\Entity;


interface ContentEntityInterface {

  public function getId();
  public function getType();
  public function tableData();
}