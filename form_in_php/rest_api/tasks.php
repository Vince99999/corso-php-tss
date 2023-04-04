<?php

use crud\TaskCRUD;
use models\Task;
include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new TaskCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $task_id = filter_input(INPUT_GET, 'task_id');
        if(!is_null($task_id)){
            echo json_encode($crud->read($task_id));
        }else{
            $tasks = $crud->read();
            echo json_encode($tasks);
        }
#Model
break;

default:
# code...
break;
}
