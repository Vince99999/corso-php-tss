<?php

//print_r ($_SERVER);

// $host = $_SERVER['HTTP_HOST'];

// if($host == 'localhost'){

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'form_in_php');

// } 

// elseif($host == 'https://formarete-tss-2223.000webhostapp.com/') {

 //configurazione per il server in line
//  define('DB_HOST', 'localhost');
//  define('DB_USER', 'id20599242_utente');
//  define('DB_PASSWORD', 'iE<MV$Z3R7Qf8R>(');
//  define('DB_NAME', 'id20599242_form_in_php');

// }


define ('DB_DSN', $dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME);
?>