<?php
class ValidateGender
{

private $value = "";



    public function isValid(string $gender): bool{
        if ($gender == "on") {
            $this->value = "checked";
           return true;
        } else {
           return false;
        }
       
    }
    public function Value(){
return $this->value;
}
}
