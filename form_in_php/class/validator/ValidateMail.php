<?php
namespace validator;



 class ValidateMail implements Validable{

    private $value = '';
    private $message;
    private $valid;

    public function __construct($default_value = '', $message = 'la email è obbligatoria') {
        $this->value = $default_value;
        $this -> valid = true;
        $this ->message = $message;
    }

public function isValid(mixed $email) : bool{

$validazione = filter_var($email, FILTER_VALIDATE_EMAIL);

if($validazione== true){
    $this -> valid = true;
    $this -> value =  $email;
} else {
    $this -> valid = false;
}
return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function getMessage(){
    return $this->message;
}


function getValid(){
    return $this-> valid;
}

public function getValue()
{
    return $this->value;
}


 }

?>