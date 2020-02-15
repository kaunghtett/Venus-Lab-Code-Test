<?php

echo "How do you want to a robot walk?";
$input = rtrim(fgets(STDIN));

 function walk(string $string) {
   $x = 0;
   $y = 0;
   $direction = 0; //360
   
   $upper_case_string = strtoupper($string);
   $str_array = string_split($upper_case_string);

   // var_dump($str_array);

   foreach($str_array as $str) {
      if($str == "R") {
         $checkdirection = checkDirection($direction);
         $direction = $checkdirection + 90;
      }elseif ($str == "L") {
         $checkdirection = checkDirection($direction);
         $direction = $checkdirection - 90;
      }
      elseif(is_numeric($str)) {
      
         if($direction == "0" ) {
            $y = $y + $str;   
         }
         elseif ($direction == "90" || $direction =="-90") {
            $x = $x + $str;
         }
         elseif ($direction == "180" || $direction == "-180") {
            $y = $y - $str;
         }
         else {
            $x = $x - $str;
         }
      }
   }
   
   $final = robotResult($direction);
   echo "X = " . $x ."\n"; 
   echo "Y = " . $y ."\n";
   echo "Direction =" . $final;  
   
 } 


 function robotResult($direction) {
  
   
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
   return $direction;

   
}



 function checkDirection($direction) {
    if($direction == "360" || $direction == "-360") {
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

 echo walk($input);

?>




