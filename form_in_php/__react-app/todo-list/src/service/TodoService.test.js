import { activeFilter, completedFilter, addTask, removeTask, updateTask } from "./TodoService.js";

const taskList = [
    
    {
        name: "comprare il latte",
        user_id:12,
        id: 11,
        due_date: "2023-04-25",
        done:true
    },
    {
        name: "comprare il dentifricio",
        user_id:12,
        id: 12,
        due_date: "2023-04-25",
        done:true
    },
    {
        name: "comprare la farina",
        user_id:10,
        id: 13,
        due_date: "2023-04-22",
        done:false
     },    
]


const activeTaskList = activeFilter(taskList)

//console.log(activeTaskList)

if(!(activeTaskList.length == 1)){
    console.log("test fallito")
}


const completedTask = completedFilter (taskList)

//console.log(completedTask)

if(!(completedTask.length == 2)){
    console.log("test fallito")
}

const newTask = {
    name: "fare i compiti",
    user_id: 12,
    due_date: "2000-03-01"
}


//const altro = taskList;
const newTasklist = addTask (newTask, taskList)
//console.log(altro)

if (!(newTasklist.length == 4)) {
    console.log("test add Task fallito")
}


//se si vuole che la nuova task aggiunta prima faccia parte del test si dovrà utilizzare come argoment
//newTasklist altrimenti per influenzare solo la lista originale usando il pattern dell'immutibilità si utilizzerà taskList
const task_id = 12;
const removedTasklist = removeTask(task_id, taskList)
console.log("--------------------")
//console.log(removedTasklist)




const updatedTaskItem= {
    "name" : "nuovo Nome Task",
    "id": 12
}

const updatetedTasksList = updateTask (updatedTaskItem,taskList)


const newTaskNoName = {
    user_id: 12,
    due_date: "2000-03-01"
}

try {
    const addTaskNoName = addTask(newTaskNoName, taskList)
    //se il try sovrastante fallisce non apparirà la stringa sottostante nel console.log
    console.log("il test nome vuoto è fallito");
} catch (error) {

    if(!(error.message === "manca il nome della task")){
        console.log("test fallito, non ho trovato l'errore che mi aspettavo")
    }
   // console.log(error.message)
}


//console.log(addTaskNoName)


const emptyStringName = {
    name : "",
    user_id: 12,
    due_date: "2000-03-01"
}

try {
    const addEmptyStringName = addTask(emptyStringName, taskList)
    //se il try sovrastante fallisce non apparirà la stringa sottostante nel console.log
    console.log("il test stringa vuota è fallito");
} catch (error) {

    if(!(error.message === "manca il nome della task")){
        console.log("test fallito, non ho trovato l'errore che mi aspettavo")
    }
   // console.log(error.message)
}


//console.log(emptyStringName)




const spaceStringName = {
    name : "   ",
    user_id: 12,
    due_date: "2000-03-01"
}

try {
    const addsSpaceStringName = addTask(spaceStringName, taskList)
    //se il try sovrastante fallisce non apparirà la stringa sottostante nel console.log
    console.log("il test stringa vuota è fallito");
} catch (error) {

    if(!(error.message === "manca il nome della task")){
        console.log("test fallito, non ho trovato l'errore che mi aspettavo")
    }
   // console.log(error.message)
}


//console.log(spaceStringName)



const toTrimTask = {
    name : " Rinnovare la patente  ",
    user_id: 12,
    due_date: "2000-03-01"
}


    const addToTrimTask = addTask(toTrimTask, taskList)

const res = addToTrimTask.find(function(task,index){
    //console.log(index+") sono dentro find", toTrimTask.name);
  return   task.name == toTrimTask.name.trim();

})


if(res == undefined){
    console.log("test fallito per addToTrimTask")
}
console.log("res", res)
