<?php
include  "./config.php";


$province_string = file_get_contents('./province.json');
$province_object = json_decode($province_string);

//var_dump($province_object);


$regioni_array = array_map(function($provincia){

return $provincia -> regione;

}, $province_object);

$regioni_unique = array_unique($regioni_array);

//le funzioni che puntano un riferimento possono accogliere solo variabili e non funzioni come il sort()
sort($regioni_unique);

print_r($regioni_unique);

$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);


    foreach ($regioni_unique as $regione) {
        $sql= "INSERT INTO regione(nome) VALUES ('Abruzzo');";
        $conn -> query($sql);
    }
    
  
} catch (\Throwable $th) {
    throw $th;
}

//file che importa le province
//decodificare
//creare tabella con nome-Stringa, sigla-Char(2)/Varchar, regione
//invece di regione devi fare regione_id e metterci id giusto, facendo una query e leggere risultato



?>