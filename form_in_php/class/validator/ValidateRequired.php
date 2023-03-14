<?php
namespace validator;


/**
 * - - preservare il valore iniziale valido (e ripulito) del  campo di testo
 * - visualizzare il messaggio di erroe per il singolo capo
 *      - - sapere se c'è un errore **isValid()**
 *      - - ripulire e controllar ei valori (sicurezza)
 *      - ogni validazione ha il suo messaggio di errore
 *      - impostare la classe di bootstrap is-invalid
 * 
 */


class ValidateRequired implements Validable {

/** @var string  rappresente il valore immesso nel form ripulito */

private $value = '';
private $message;
private $hasMessage;
/**se il valore è valido e se devo visualizzare il messaggio*/
private $valid;
public function __construct($default_value='', $message= 'il nome è obbligatorio') {
    $this->value = $default_value;
    $this -> valid = true;
    $this ->message = $message;
}

public function IsValid($value)
{
    $valueWithoutSpace = trim(strip_tags($value));

    if ($valueWithoutSpace == ''){
        $this -> valid = false;
        return false;
    }
    $this->valid = true;
    $this -> value =  $valueWithoutSpace;
    return $valueWithoutSpace;
}

public function getValue()
{
    return $this->value;
}

public function getMessage(){
    return $this->message;
}

public function getValid()
{
return $this-> valid;
}

}