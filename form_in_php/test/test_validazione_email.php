<?php

// $files = scandir("./form_in_php/class/validator");
// print_r($files);

use validator\ValidateMail;

require "./form_in_php/class/validator/ValidateMail.php";

$emails = [ 

    'a', '   ', 'a@', 'Mario', "<h1>ciccio</h1>", 'a<@.a'

];


$v = new ValidateMail();


// richimare un metodo in java v.isValid('a')
// in php il ruolo del punto è svolto da ->

foreach($emails as $index => $email){
   if($v -> isValid($email) == false){
    echo "test superato per $email\n";
   }else{
    echo "test numero $index non superato per [$email]";
   };
}

//$v ->getMessage();







?>