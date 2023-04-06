<?php

use crud\TaskCRUD;
use models\Task;

include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new TaskCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

  if(     $task_id = filter_input(INPUT_GET, 'task_id')){
        if (!is_null($task_id)) {
            echo json_encode($crud->read($task_id));
        } 
    }elseif(
         $user_id = filter_input(INPUT_GET, 'user_id')){
         $userTasks = $crud->getUserTasks($user_id);
         echo json_encode($userTasks);
        }
        elseif($task_id==null && $user_id== null){
            $tasks = $crud->read();
            echo json_encode($tasks);
        }

        #Model
        break;

    case 'POST':

        $input = file_get_contents('php://input');
        $request = json_decode($input, true);
        $task =  Task::arrayToTask($request);
        $last_id = $crud->create($task);
        //print_r($last_id);

        $task = (array) $task;
       // print_r ($task);

        $task['task_id'] = $last_id;


        $response = [
            'data' => $task,
            'status' => 202
        ];

        echo json_encode($response);
        break;

    case 'PUT':
        $task_id = filter_input(INPUT_GET, 'task_id');

        $input = file_get_contents('php://input');

        $request = json_decode($input, true);

        $task =  Task::arrayToTask($request);
        $task = (array) $task;
        $task['task_id'] = $task_id;
        $taskagain = Task::arrayToTask($task);
        $rows = $crud->update($taskagain);

        $last_id = $crud->update($taskagain);

        // var_dump ($useragain);

        $taskagain = (array) $taskagain;

        $taskagain['task_id'] = $task_id;

        $response = [
            'data' => $taskagain,
            'status' => 202
        ];

        $result = $crud->read($task_id);

        if ($rows == 0 && $result != null) {

            http_response_code(200);
            $response = [
                'errors' => [
                    [
                        'status' => 204,
                        'title' => 'task già aggiornata con i parametri immessi',
                        'details' => $task_id
                    ]
                ]
            ];
        } elseif ($rows == 0 && $result == false) {

            http_response_code(404);

            $response = [
                'errors' => [
                    [
                        'status' => 404,
                        'title' => 'id inesistente',
                        'details' => $task_id
                    ]
                ]
            ];
        }

        echo json_encode($response);

        break;

    case 'DELETE':
        $task_id = filter_input(INPUT_GET, 'task_id');
        if (!is_null($task_id)) {
            $rows =  $crud->delete($task_id);
            if ($rows == 1) {
                http_response_code(204);
            }
            if ($rows == 0) {

                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => 'Task non eliminata o inesistente',
                            'details' => $task_id
                        ]
                    ]
                ];
            }
            echo json_encode($response);
        }
        break;

    default:
        # code...
        break;
}
