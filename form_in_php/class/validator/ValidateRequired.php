<?php
require "./form_in_php/class/validator/Validable.php";
class ValidateRequired {

public function IsValid($value)
{
    $valueWidoutSpace = trim(strip_tags($value));
    if ( $valueWidoutSpace == ' '){
        return false;
    }
    return $valueWidoutSpace;
}
}