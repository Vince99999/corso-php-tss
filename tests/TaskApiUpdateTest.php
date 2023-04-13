<?php
use PHPUnit\Framework\TestCase;

require_once "./config.php";

Class TaskApiUpdateTest extends TestCase{
  
public function test_update_task_api(){
 // (new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE task;");
$payload  =    [
    "user_id" => "1",
    "name" => "task",
    "due_date" => "2017-03-17",
    "done" => true
];
  


$response = $this -> put("http://localhost/corso-php-tss/form_in_php/rest_api/tasks.php?task_id=5", $payload);

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
  CURLOPT_CUSTOMREQUEST => "POST",
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