<?php
/**
 * $ -> VARIABILE
 * ""/'' -> STRINGA
 * quando mancano questi elementi per php nella maggior parte dei casi ciò che si è scritto è una costante (che può essere sia stringa che intero)
 * 
 */
$test = filter_input(INPUT_GET, 'email',FILTER_VALIDATE_EMAIL);


if($test === false){

    echo "\nLa email non è valida\n";
} else {

    echo "Grazie, la tua email è valida: $test";
}