import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';
import TaskItem from './components/TaskItem/TaskItem';
import TaskList from './components/TaskList/TaskList';

import {useState} from "react";
import SearchBar from './components/SearchBar';

function App() {

const taskListData = []
//   const taskListData =  [
//     {
//       task_id:10,
//       user_id:12,
//       name: "comprare il latte",
//       due_date:"2023-04-4",
//       done:true
//   },

//     {
//       task_id:11,
//   user_id:12,
//       name: "leggere un manuale a caso",
//       due_date:"2023-04-4",
//       done:false
//   }
  
//   ]
 
return (
  <main>

<SearchBar> </SearchBar>

    {/* <button onClick={aggiungiTask}>add task</button> */}
    {/* <TaskItem nome_task={'Comprare il Campari'}></TaskItem> */}
    {/* {list} */}
    <TaskList header={'Cose da fare oggi'} tasks={taskListData}>
    { taskListData.map( task =><TaskItem key={task.task_id} done = {task.done} nome_task={task.name} /> )  }
    </TaskList>

    <TaskList header={'Cose da fare domani'}tasks={taskListData}>
    { taskListData.map( task =><TaskItem key={task.task_id} done = {task.done} nome_task={task.name} /> )  }
    </TaskList>
  </main>
)
}

export default App;
