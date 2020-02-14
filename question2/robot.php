<?php

$string1 = 'W5RW5RW2RW1R';


 function walk(string $string) {
   $x = 0;
   $y = 0;
   $direction = 0; //360
   
   $upper_case_string = strtoupper($string);
   $str_array = string_split($upper_case_string);

   foreach($str_array as $str) {
      if($str == "R") {
         $checkdirection = checkDirection($direction);
         $direction = $checkdirection + 90;
      }elseif ($str == "L") {
         $direction = $checkdirection - 90;
      }
      elseif(is_numeric($str)) {
      
         if($direction == "0") {
            $y = $y + $str;   
         }
         elseif ($direction == "90") {
            $x = $x + $str;
         }
         elseif ($direction == "180") {
            $y = $y - $str;
         }
         else {
            $x = $x - $str;
         }
      }
   }
   
   $final = robotResult($x,$y,$direction);
   var_dump($final);
   
 } 


 function robotResult($x,$y,$direction):array {
    echo $direction;
   $finalarray = [];
   $checkdirection = checkDirection($direction);
   if($checkdirection == "0") {
      $direction = "North";
   }elseif ($checkdirection == "90") {
      $direction = "East";
   }elseif ($checkdirection == "180") {
      $direction = "South";
   }else {
      $direction = "West";
   }
   array_push($finalarray,["X" => $x, "Y" => $y, "Direction" => $direction]);

   return $finalarray;
}



 function checkDirection($direction) {
    if($direction == "360") {
       $direction = 0;
       return $direction;
    }else {
       return $direction;
    }
 }


 
 function string_split(string $string):array {
   $string_array = []; 
   preg_match_all("/[A-Z]+|\d+/",$string,$matches);

   foreach($matches[0] as $match) {
      $string_count = strlen($match);
      if(!is_numeric($match) && $string_count > 1) {
         $string_datas = str_split($match);
         foreach($string_datas as $str_data) {
            array_push($string_array,$str_data); 
         }
      }else {
         array_push($string_array,$match);
      } 
   }

   return $string_array;

 }

 echo walk($string1);

?>




