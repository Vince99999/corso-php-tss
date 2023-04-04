<?php

use crud\UserCRUD;
use models\User;
include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new UserCRUD;


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $user_id = filter_input(INPUT_GET, 'user_id');
        if(!is_null($user_id)){
            echo json_encode($crud->read($user_id));
        }else{
            $users = $crud->read();
            echo json_encode($users);
        }
        //var_dump($user_id); 
       //ottenere i dati degli utenti
#Model
break;

CASE 'DELETE':

        $user_id = filter_input(INPUT_GET, 'user_id');
        if(!is_null($user_id)){
           $rows=  $crud -> delete($user_id);
           if($rows == 1){

            http_response_code(204);

           }
           if($rows==0){

            http_response_code(404);

            $response = [
                'errors'=> [
                   [ 
                    'status' => 404,
                    'title' => 'Utente eliminato',
                    'details' => $user_id
                   ]
                ]
            ];
        }
        echo json_encode($response);
        }
        break;

case 'POST':
//echo "post";
 //   print_r($_POST);
//il post in realtà ha molti metodi di invio dei dati non la sola variabile globale per questo motivo
//quando si utilizza questo modo di invio dei dati per raccoglierli è necessario spesso non concentrarsi solo
//sulla variabile globale $_POST ma utilizzare il metodo file_get_contents in questo caso con l'attributo
//('php://input') che è il luogo da cui arriva il dato in questo modo il posto potrà òeggere non solo il formato dell'array associativo
//tipico delle variabili globali ma anche gli altri metodi di invio dei dati tramite post
    $input = file_get_contents('php://input');
    $request =json_decode($input, true);
   $user =  User::arrayToUser($request);
   $last_id = $crud-> create($user);

// $response =[
//     'data' =>[
//         'type' => "users",
//         'id' => $last_id,
//         'attributes' => $user
//     ]
//     ];

//unset annulla le variabili che non saranno visibili quindi nell'echo di verifica
//nel nostro caso per usare questo comando si deve prima castare $user in array
$user = (array) $user;
unset($user['password']);

$user['user_id'] = $last_id;


    $response = [
        'data' => $user,
        'status' => 202
    ];

echo json_encode($response);
      break;

    case 'PUT':
        $user_id = filter_input(INPUT_GET, 'user_id');
        
        $input = file_get_contents('php://input');

        $request =json_decode($input, true);

        $user =  User::arrayToUser($request);
        $user = (array) $user;
        $user['user_id'] = $user_id;
        $useragain = User::arrayToUser($user);
        $rows = $crud -> update($useragain);

        $last_id = $crud-> update($useragain);

       // var_dump ($useragain);

        $useragain = (array) $useragain;

        $useragain['user_id'] = $user_id;

        $response = [
            'data' => $useragain,
            'status' => 202
        ];
    
        //posso controllare gli errori anche instanziando un nuovo PDO ed utilizzando
        //le query appropriate

// $query = "select user_id from user where user_id = $user_id;";
// $conn = new \PDO (DB_DSN, DB_USER, DB_PASSWORD);
//   $stm = $conn -> prepare($query);
//   $stm -> execute();
//   $result = $stm -> fetchAll(\PDO::FETCH_CLASS,User::class);
//   //var_dump($result);


//oppure posso utilizzare il metodo CRUD predisposto per il ispezionare
//il database ovvimanete le condizioni presenti nell'if saranno leggermente diverse
  
  $result = $crud->read($user_id);

    if($rows==0 && $result != null){
        //var_dump ($result);
        http_response_code(200);
        $response = [
            'errors'=> [
               [ 
                'status' => 204,
                'title' => 'Utente già aggiornato con i parametri immessi',
                'details' => $user_id
               ]
            ]
        ];

    } elseif ($rows==0 && $result == false) {

         http_response_code(404);

        $response = [
            'errors'=> [
               [ 
                'status' => 404,
                'title' => 'id inesistente',
                'details' => $user_id
               ]
            ]
        ];
    }

    echo json_encode($response);

      break;

    default:
        # code...
        break;
}
