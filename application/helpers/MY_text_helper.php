<?php
function abbreviate($string){
    $abbreviation = "";
    $string = ucwords($string);
    $words = explode(" ", "$string");
      foreach($words as $word){
          $abbreviation .= $word[0];
      }
   return $abbreviation; 
}
