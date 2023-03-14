<?php

namespace validator;

class ValidateGender implements Validable
{

private $value = "";



    public function isValid( $gender): bool{
        if ($gender == "on") {
            $this->value = "checked";
           return true;
        } else {
           return false;
        }
       
    }
    public function getValid(){
return $this->value;
}

public function getMessage()
{
  
}
}
