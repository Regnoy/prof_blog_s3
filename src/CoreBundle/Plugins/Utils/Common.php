<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 8/1/2017
 * Time: 8:22 AM
 */

namespace CoreBundle\Plugins\Utils;


class Common {

  public static function convertArrayToSubArrays(array $convert_array, $value){
    $arr = array();
    $ref = &$arr;
    $ttl = count($convert_array);

    foreach ($convert_array as $k => $key) {
      $def = [];
      if($k == ($ttl-1))
        $def = $value;
      $ref[$key] = $def;
      $ref = &$ref[$key];
    }
    return $arr;
  }

}