<?php
use PHPUnit\Framework\TestCase;

require "./form_in_php/config.php";

Class UserApiCreateTest extends TestCase{
  
public function test_create_user_api(){
 // (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");
$payload  = [
    "first_name" => "Miriana",
    "last_name" => "DaRoit",
    "birthday" => "2017-03-17",
    "birth_place" => "Fermo",
    "regione_id" => 16,
    "provincia_id" => 15,
    "gender" => "F",
    "username" => "miri@email.com",
    "password" => "ciccio",
];

$response = $this -> post("http://localhost/corso-php-tss/form_in_php/rest_api/users.php", $payload);

//$this -> assertEquals(1,5);

fwrite(STDERR, print_r($response, TRUE));
$this -> assertJson($response);

//$this -> assertNull($response);

}

public function post(string $url, array $body){
//curl = client http in linea di comando, programma presente in quasi tutti i sistemi operativi e comunque scaricabile che permette di fare chiamate http tramite linea di comando
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",

//  CURLOPT_POSTFIELDS => "  {\n    \"first_name\": \"Miriana\",\n    \"last_name\": \"DaRoit\",\n    \"birthday\": \"2017-03-17\",\n    \"birth_place\": \"Fermo\",\n    \"regione_id\": 16,\n    \"provincia_id\": 15,\n    \"gender\": \"F\",\n    \"username\": \"miriana@email.com\",\n    \"password\": \"ciccio\"\n  }\n  \n",
  CURLOPT_POSTFIELDS => json_encode($body),
  CURLOPT_HTTPHEADER => [
    "Accept: */*",
    "Content-Type: application/json",
    "User-Agent: Thunder Client (https://www.thunderclient.com)"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  return $response;
}

}

}



?>