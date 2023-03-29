<?php

use crud\UserCRUD;
use models\User;
include "../../config.php";
include"../autoload.php";

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

    $input = file_get_contents('php://input');
    $request =json_decode($input, true);
   $user =  User::arrayToUser($request);
   $crud-> create($user);
      break;
    default:
        # code...
        break;
}
