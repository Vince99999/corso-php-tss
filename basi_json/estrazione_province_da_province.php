<?php
include  "./config.php";


$province_string = file_get_contents('./province.json');
$province_object = json_decode($province_string);

//var_dump($province_object);


$province_array = array_map(function($provincia){

return
[
    'nome' => $provincia -> nome,
    'sigla'=> $provincia -> sigla
];

}, $province_object);

//var_dump($province_array);

$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);

    $conn -> query( 'Truncate Table provincia');



    foreach ($province_array as $città => $provincia) {

            $provincia = implode(',',$provincia);
           // var_dump(substr($provincia,-2));
           // var_dump(substr($provincia,0,-3));

            $sigla=addslashes(substr($provincia,-2));
            $nome = addslashes(substr($provincia,0,-3));
         

        $sql = "INSERT INTO provincia (nome, sigla) VALUES ('$nome','$sigla');";
        echo $sql."\n";
        $conn -> query($sql);
    }
    
  
} catch (\Throwable $th) {
    throw $th;
}





?>