import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';
import TaskItem from './components/TaskItem/TaskItem';
import TaskList from './components/TaskList/TaskList';

import {useEffect, useState} from "react";
import SearchBar from './components/SearchBar';
import { activeFilter, addTask, completedFilter, getTaskApi, removeTask, updateTaskbyid } from './service/TodoService';

function App() {


let tasklist = localStorage.getItem('tasklist')
//il metodo getItem di localStorage prende le informazioni registrate sottoforma di stringa
console.log("tasklist", tasklist);
if(tasklist == null){
  tasklist = [];
}else{
  tasklist = JSON.parse(tasklist);
  // il metodo parse di JSON trasforma la stringa passata come argomento in un json se la sintassi della stringa corrispode a quella di un json
}


  const[taskListData, setTaskListData] = useState([]);    
    //   ([
    //   { 
    //   name:"comprare il latte",
    //   user_id:12,
    //   id:11,
    //   due_date:"2023-04-25",
    //   done:true
    //   },
    //   {
    //   name:"comprare il dentifricio",
    //   user_id:12,
    //   id:12,
    //   due_date:"2023-04-25",
    //   done:false
    //   }, 
    //   {
    //   name:"comprare il la farina",
    //   user_id:10,
    //   id:13,
    //   due_date:"2023-04-22",
    //   done:true
    //   },
    
    
    // ])


  const[filteredTask, setFilteredTask] = useState(taskListData)

// useEffect(() => {
//   getTaskApi().then(json => {
//   setTaskListData(json.data)
//   })
// },[])


  // getTaskApi().then(json => {
  // setTaskListData(json)
  // })


  //esempio non dinamico
//const taskListData = []
  // const taskListData =  [
  //   {
  //     task_id:10,
  //     user_id:12,
  //     name: "comprare il latte",
  //     due_date:"2023-04-4",
  //     done:true
  // },

  //   {
  //     task_id:11,
  // user_id:12,
  //     name: "leggere un manuale a caso",
  //     due_date:"2023-04-4",
  //     done:false
  // }
  
  // ]

function ParentAddTask(newTask) {

  //TODO USER_ID
  const newTaskListData = addTask(newTask, taskListData)
  //console.log(taskListData)

  setTaskListData(newTaskListData)
  setFilteredTask(newTaskListData)
  localStorage.setItem('tasklist', JSON.stringify(newTaskListData))
  //il metodo setItem di localStorage aggiunge una stringa alla memoria del localStorage
  //il metodo stringify di JSON trasforma il file json passato come argomento in una stringa che avrà una sintassi corrsipondente ad un file json

  useEffect(()=> {
    addTask(newTask)
  }, [])
}

function parentRemoveTask(taskId) {
  console.log("parentRemoveTask "+ taskId)
  const res = removeTask(taskId,taskListData)
  setTaskListData(res)
  setFilteredTask(res)
  localStorage.setItem('tasklist', JSON.stringify(res))

}

function parentUpdateTask(id){
const res = updateTaskbyid(id,taskListData)
console.log(res)
setTaskListData(res)
setFilteredTask(res)
localStorage.setItem('tasklist', JSON.stringify(res))
}



function onShowCompleted() {
  // chiamo il servizio 
  // aggiorno lo stato
    const res = completedFilter(taskListData)
    setFilteredTask(res)
}
function onShowAll() {
  // chiamo il servizio 
  // aggiorno lo stato
  setFilteredTask(taskListData)
}
  
function onShowActive() {
  // chiamo il servizio 
  // aggiorno lo stato
const res = activeFilter(taskListData)
setFilteredTask(res)

}

return (
  <main>

{/* ATTENZIONE la proprietà  parentAddTask contiene una funzione parentAddTask ma non sono la stessa cosa */}
<SearchBar parentAddTask={ParentAddTask}> </SearchBar>

    <button onClick={onShowAll}>all</button>
    <button onClick={onShowActive}>active</button>
    <button onClick={onShowCompleted}>completed</button>

    {/* <button onClick={aggiungiTask}>add task</button> */}
    {/* <TaskItem nome_task={'Comprare il Campari'}></TaskItem> */}
    {/* {list} */}
    <TaskList header={'Cose da fare oggi'} tasks={taskListData}>
      {/* ricordare che react usa la key per tenere traccia dei dati da modificare quindi un dato undefined causa dei problemi di ordinamento degli stessi e di conseguenza di visualizzazione */}
    {filteredTask.map( task =><TaskItem key = {task.id}
                                parentRemoveTask = {parentRemoveTask}
                                parentUpdateTask = {parentUpdateTask}
                                id = {task.id}  
                                done = {task.done}
                                nome_task = {task.name} /> ) }
    </TaskList>

    {/* <TaskList header={'Cose da fare domani'}tasks={taskListData}>
    {taskListData.map( task =><TaskItem key={task.task_id} done = {task.done} nome_task={task.name} /> )  }
    </TaskList> */}
  </main>
)
}

export default App;
