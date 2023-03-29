<?php

use Registry\it\Regione;

require "./config.php";
require "./form_in_php/class/Registry/it/Regione.php";

//$regioni = new Regioni();

//($regioni -> all(); //array di(stdClass) regioni

//Metodo statico deve essere richiamato /utilizzatto/eseguito senza creare una istanza
//utilizzo metodo statico ::

$regioni=Regione::all();

print_r($regioni);

?>