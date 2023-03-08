<?php
include  "./config.php";


$province_string = file_get_contents('./province.json');
$province_object = json_decode($province_string);

//var_dump($province_object);


$province_array = array_map(function($provincia){

return
[
    'nome' => $provincia -> nome,
    'sigla'=> $provincia -> sigla,
    'regione'=> $provincia -> regione
];

}, $province_object);

//var_dump($province_array);

$dsn = "mysql: host.=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);

    $conn -> query( 'Truncate Table provincia');



    foreach ($province_array as $città => $provincia) {
$nome = addslashes ($provincia['nome']);
$sigla =addslashes  ($provincia['sigla']);
$regione = addslashes  ($provincia['regione']);

$id_regione_sql ="select regione_id from regione where nome_regione = '$regione';";
$id_regione=$conn -> query($id_regione_sql)->fetchColumn();



                      

        //    $provincia = implode(',',$provincia);
           // var_dump(substr($provincia,-2));
           // var_dump(substr($provincia,0,-3));

        //    $sigla=addslashes(substr($provincia,-2));
        //    $nome = addslashes(substr($provincia,0,-3));
         

        $sql = "INSERT INTO provincia (nome, sigla, id_regione) VALUES ('$nome','$sigla','$id_regione');";
        echo $sql."\n";
        $conn -> query($sql);
    }
    
  
} catch (\Throwable $th) {
    throw $th;
}





?>