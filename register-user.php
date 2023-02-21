<?php
require 'C:\xampp\htdocs\corso-php-tss\form_in_php\class\validator\ValidateMail.php';
require 'C:\xampp\htdocs\corso-php-tss\form_in_php\class\validator\ValidateString.php';
require 'C:\xampp\htdocs\corso-php-tss\form_in_php\class\validator\ValidateDate.php';
require 'C:\xampp\htdocs\corso-php-tss\form_in_php\class\validator\ValidateGender.php';
//<pre>  per stampare i valori uno sotto l'altro
echo"<pre>";
//array
//stampa i valori in un array
print_r($_POST);
echo"</pre>";

// //la chiave dell'array associativo è presa dal name del tag


$nome = filter_input(INPUT_POST, "first_name");                 //
$cognome = filter_input(INPUT_POST, "last_name");               //
$data_di_nascita = filter_input(INPUT_POST, "birthday");        //
$luogo_di_nascita = filter_input(INPUT_POST, "birth_place");    //
$genere = filter_input(INPUT_POST, "gender");                   //         
$email = filter_input(INPUT_POST, "email");                     //
$password = filter_input(INPUT_POST, "password");               //

// if($nome==false or $cognome==false  or $data_di_nascita==false or 
// $luogo_di_nascita==false or $sesso==false or $email==false or $password==false) {
//     echo "\nla registrazione non è valida\n";
// } else {
//     echo "Registrazione avvenuta con successo";
// }
// echo "<br>--------------------------------<br>";

var_dump($luogo_di_nascita);

$firstname = new ValidateString();
var_dump($firstname -> isValid($_POST ['first_name']));
echo "<br>--------------------------------<br>";
$lastname = new ValidateString();
var_dump($lastname -> isValid($_POST ['last_name']));
echo "<br>--------------------------------<br>";
$birth_palce = new ValidateString();
var_dump($birth_palce -> isValid($_POST ['birth_place']));
echo "<br>--------------------------------<br>";
$password = new ValidateString();
var_dump($password -> isValid($_POST ['password']));
echo "<br>--------------------------------<br>";
$mail = new ValidateMail();
// per richiamare i metodi in php si usa la freccia
var_dump($mail -> isValid($email));
// if ($mail -> isValid($email) == false) {
//     echo "email non valida";
// }else {
//     echo "email valida";
// }
echo "<br>--------------------------------<br>";
$birthday = new ValidateDate();
var_dump( $birthday ->isValid($data_di_nascita));
echo "<br>--------------------------------<br>";
//print_r( filter_list());

$contatore = 0;

foreach($_POST as $chiave => $valore ){
    if($chiave == 'birthday'){
        $birthday = new ValidateDate();
        $controllo = $birthday ->isValid($valore);
        if($controllo == false){
            echo "Attenzione: il campo <strong>data di nascita</strong> non è valido, provare ad inserire una nuova data"."<br>";
            $contatore += 1;
        }
    } elseif ($chiave == 'email') {
        $mail = new ValidateMail();
        $controllo =$mail -> isValid($valore);
        if($controllo == false){
            echo "Attenzione: il campo <strong>nome utente</strong> non è valido, provare ad inserire una nuova email"."<br>";
            $contatore += 1;
        }
    } elseif ($chiave == 'gender') {
        $gender = new ValidateGender();
        $controllo = $gender -> isValid($valore);
        if($controllo == false){
            echo "Attenzione: il campo <strong>genere</strong> non è valido, provare a scegliere nuovamente il genere"."<br>";
            $contatore += 1;
        }
    } else {
        $string = new ValidateString();
        $controllo = $string -> isValid($valore);
        if($controllo == false){
            echo "Attenzione: il campo <strong>" .$chiave."</strong> non è valido, provare a completare il campo ". $chiave." con un nuovo valore"."<br>";
            $contatore += 1;
        }
    }
}

if ($contatore == 0) {echo "REGISTRAZIONE AVVENUTA CON SUCCESSO";}
else {echo "REGISTRAZIONE NON AVVENUTA, EFFETTUARE UNA NUOVA REGISTRAIONE CORREGGENDO I PARAMETRI INDICATI";}

?>
