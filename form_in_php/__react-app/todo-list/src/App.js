import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';
import TaskItem from './components/TaskItem/TaskItem';
import TaskList from './components/TaskList/TaskList';

import {useState} from "react";
import SearchBar from './components/SearchBar';
import { activeFilter, addTask, completedFilter, removeTask } from './service/TodoService';

function App() {


  const[taskListData, setTaskListData] = useState([])


  const[filteredTask, setFilteredTask] = useState(taskListData)



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

function parentAddTask(newTask) {

  //TODO USER_ID
  const newTaskListData = addTask(newTask, taskListData)
  //console.log(taskListData)

  setTaskListData(newTaskListData)
}

function parentRemoveTask(taskId) {
  console.log("parentRemoveTask "+ taskId)
  const res = removeTask(taskId,taskListData)
  setTaskListData(res)
}

// function parentUpdateStatus(done) {

//   if (done == false) {
//     done == true
//   }else {
//     done == true
//   }
  
// }



function onShowCompleted() {
  // chiamo il servizio 
  // aggiorno lo stato
  // console.log("tasto attivato")
  //  const res = completedFilter(filteredTask)
  //  console.log(res)
  //  setTaskListData(res)
}
function onShowAll() {
  // chiamo il servizio 
  // aggiorno lo stato
  console.log("tasto attivato")
 // setFilteredTask(taskListData)

  
}
  
function onShowActive() {
  // chiamo il servizio 
  // aggiorno lo stato
console.log("tasto attivato")

 
}

return (
  <main>

{/* ATTENZIONE la proprietà  parentAddTask contiene una funzione parentAddTask ma non sono la stessa cosa */}
<SearchBar parentAddTask={parentAddTask}> </SearchBar>

    <button onClick={onShowAll}>all</button>
    <button onClick={onShowActive}>active</button>
    <button onClick={onShowCompleted}>completed</button>

    {/* <button onClick={aggiungiTask}>add task</button> */}
    {/* <TaskItem nome_task={'Comprare il Campari'}></TaskItem> */}
    {/* {list} */}
    <TaskList header={'Cose da fare oggi'} tasks={taskListData}>
    { taskListData.map( task =><TaskItem key = {task.task_id}
                                parentRemoveTask = {parentRemoveTask}
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
