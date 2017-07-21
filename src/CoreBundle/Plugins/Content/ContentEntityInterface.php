<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 6/29/2017
 * Time: 9:04 AM
 */

namespace CoreBundle\Plugins\Content;


interface ContentEntityInterface {

  public function id();

  public function title();

  public function canonicalLink();
  public function editLink();
  public function addLink();

}