<h1> sono la risposta (RESPONSE) </h1>

<?php

echo "get:Array";
//  $_ rappresenta una variabile superglobale in particolare le variabili $_GET e $_POST sono variabili superglobali che contengono un array
echo"<pre>";
print_r($_GET);
echo"</pre>";

echo "post:Array";
// il metodo POST consente di modificare/aggiungere il testo ai parametri passati con esso
echo"<pre>";
print_r($_POST);
echo"</pre>";

echo "la tua mail è <br>";

echo "<strong>".$_POST['email']."</strong>";