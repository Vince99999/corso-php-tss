<?php
class ValidateGender
{

    public function isValid(string $gender): bool{
        if ($gender == "on") {
           return true;
        } else {
           return false;
        }
    }
        
}
