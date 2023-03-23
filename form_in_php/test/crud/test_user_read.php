<?php

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";


(new PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE user;");

$crud = new UserCRUD();
$user = new User();

$user -> first_name ="Mario";
$user -> last_name = "Rosso";
$user -> birth_place = "Torino";
$user -> birthday = "2017-01-01";
$user -> gender = "M";
$user ->  regione_id = "9";
$user -> provincia_id = "15";
$user ->  username = "luigiverdi@email.com";
$user ->  password = md5('Password');



$crud -> create($user);
//print_r($user);

// $result = $crud -> read();
// if($result === false){
//     echo "\ndatabase iniziale vuolo\n";
// }



// $result = $crud ->read(1); //User
// if(class_exists(User::class) && get_class($result) == User::class){
//     echo "\nutente esistente test superato\n";
// }
// //print_r($result);


// $result = $crud -> read(2);  // array vuoto // false
// print_r ($result) ;
// if($result === false){
//     echo "\nutente non esistente test superato\n";
// }

// $result = $crud -> read();  // array | vuoto
// if(is_array($result) && count($result) === 1);{
//     echo "\nricerca di tutti gli utenti (1)\n";
// }
// //print_r ($result) ;





// $crud -> delete(1);
// $crud -> read(1);
// if($result === false){
//     echo "\nutente con id 1 è stato eliminato\n";
//}

$user -> first_name ="Marco";
$user -> last_name = "Verdi";
$user -> birth_place = "Torino";
$user -> birthday = "2017-01-01";
$user -> gender = "M";
$user ->  regione_id = "9";
$user -> provincia_id = "15";
$user ->  username = "luigiverdi@email.com";
$user ->  password = md5('Password');

print_r($user);

  $crud -> update($user,1);
//  $crud -> read(1);
//  print_r($user);

// TODO: inserire un secondo utente per testale la cacellazione singola


?>