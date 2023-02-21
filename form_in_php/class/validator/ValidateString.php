<?php
 class ValidateString {

    public function isValid(string $string) : bool {
      $controllo = false;
      $corretta = trim(strip_tags($string));
         if($corretta != $string or $string==""){
            $controllo = $controllo;
            } else {
                     $controllo=true;
                  }
         return  $controllo;
    }
     }

?>