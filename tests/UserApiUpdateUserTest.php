<?php
use PHPUnit\Framework\TestCase;

require_once "./form_in_php/config.php";

Class UserApiUpdateUserTest extends TestCase{
  
public function test_update_user_api(){
 // (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE task;");
$payload  =    [
    "first_name" => "Martina",
    "last_name"=> "A",
    "birthday"=> "2017-03-17",
    "birth_place"=> "Fermo",
    "regione_id"=> 16,
    "provincia_id"=> 15,
    "gender"=> "F"
];

$response = $this -> put("http://localhost/corso-php-tss/form_in_php/rest_api/users.php?user_id=7", $payload);

fwrite(STDERR, print_r($response, TRUE));
$this -> assertJson($response);

}

public function put(string $url, array $body){

  $curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
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