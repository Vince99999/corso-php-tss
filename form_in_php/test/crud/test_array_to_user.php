<?php
use models\User;
require "form_in_php/test/test_autoload.php";


$colore = "blue";
// Variabili di variabili
//$$colore;
// adesso la stringa blu è diventata la variabile $blue




# php form_in_php/test/crud/test_array_to_user.php
$user_array = [
"first_name" => "Paolo",
"last_name" => "Rossi",
"birth_place" => "Giovoletto",
"birthday" => "2020-12-20",
"gender" => "M",
"regione_id" => 10,
"provincia_id" => 3,
"username" => "a@b.com",
"password" => "ciccio",
];

// $class_name = User::class;
// $user = new $class_name;

$user = User::arrayToUser($user_array);
if(get_class($user) == User::class){
    echo "\ntest passato è un oggetto di tipo User\n";
    print_r($user);
}


?>