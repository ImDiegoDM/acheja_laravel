<?php

namespace App;

/**
 *
 */
class Helper
{
  public static function mask($value,$mask)
  {
    $maskered="";
    $valueIndex=0;
    for ($i=0; $i < strlen($mask); $i++) {
      if($mask[$i]=='*'){
        $maskered.=$value[$valueIndex];
        $valueIndex++;
      }
      else {
        $maskered.=$mask[$i];
      }
    }

    return $maskered;
  }
}

 ?>
