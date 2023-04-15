<?php

//print_r ($_SERVER);

//$host = $_SERVER['HTTP_HOST'];

//if($host == 'localhost'){

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'form_in_php');

//} 

//elseif($host == #nome host scelto) {

// //configurazione per il server in line
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'form_in_php');

//}


define ('DB_DSN', $dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME);
?>