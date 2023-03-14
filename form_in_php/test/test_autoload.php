<?php
//funzione di callback e cioè funzione passata come argomento di un altra funzione
require "./config.php";

use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateGender;
use validator\ValidateMail;
use validator\ValidateRequired;

spl_autoload_register(function($className){

echo "\nsto cercando $className\n";
//validator/ValidateMail


$className= str_replace("\\", "/", $className);

require "./form_in_php/class/".$className.".php";
echo "\n\n\n";

//"./form_in_php/class/validator/ValidataMail.php";

});

//prima di tutto verrà lanciata la funzione spl_autoload_register() l'argomento poi
//verrà di volta in volta sostituito con le istanze di classe presenti nel file
//verranno cercate nel path indicato ed il file verrà ciclato come indicato nella funzione  di 
//callback inoltre automaticamente tutte le dipendenze verranno automaticamente richiamate senza
//necessita del require o dell'include.

new ValidateMail();
new ValidateDate();
new ValidateRequired();
new ValidateGender();

new Regione();

Regione::all();
Provincia::all();



?>