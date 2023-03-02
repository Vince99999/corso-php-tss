<?php


/**
 * - preservare il valore iniziale valido (e ripulito) del  campo di testo
 * - visualizzare il messaggio di erroe per il singolo capo
 *      - sapere se c'è un errore **isValid()**
 *      - ripulire e controllar ei valori (sicurezza)
 *      - ogni validazione ha il suo messaggio di errore
 *      - impostare la classe di bootstrap is-invalid
 * 
 */



class ValidateRequired implements Validable {

public function IsValid($value)
{
    $valueWidoutSpace = trim(strip_tags($value));
    if ( $valueWidoutSpace == ' '){
        return false;
    }
    return $valueWidoutSpace;
}
}