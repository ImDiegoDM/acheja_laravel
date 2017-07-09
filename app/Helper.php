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
      if($mask[$i]=='*'&&$valueIndex<strlen($value)){
        $maskered.=$value[$valueIndex];
        $valueIndex++;
      }
      else {
        $maskered.=$mask[$i];
      }
    }

    return $maskered;
  }

  public static function DistanceOfTwoPoints($latp1,$lngp1,$latp2,$lngp2)
  {
    $EarthRadius = 6371;
    $difLat = deg2rad ($latp1-$latp2);
    $difLong = deg2rad ($lngp1-$lngp2);
    $latp1 = deg2rad ($latp1);
    $latp2 = deg2rad ($latp2);
    $a = sin($difLat/2)**2+cos($latp1)*cos($latp2)*sin($difLong/2)**2;
    $c = 2*atan2(sqrt($a),sqrt(1-$a));

    return $EarthRadius * $c;
  }
}

 ?>
