//l'esportazione per default non richiede l'uso delle graffe
//nel caso sottostante non essendo un export per default richiede l'uso delle graffe

import {useState} from "react";

//quando ad un tag noirmalmente manca un corrispondente tag di chiusuta si deve utilizzare in react
// la chiusura implicita   al findo del tag />

//arrow function
const SearchBar = (props) => {
// Hook useState const taskName | const setTaskName()
// taskName è la variabile che contiene lo stato attuale
// setTaskName è la funzione che devo invocare ogni volta che devo comunicare a react 
// che il valore di taskName è cambiato
const [taskName, setTaskName] = useState('')
const [taskDueDate, setTaskDueDate] = useState('')


function onAddTask() {
    console.log(taskName)
    const newTask = {
        name:taskName.trim(),
        due_date:taskDueDate,
        done:false
        
    }
    props.parentAddTask(newTask)
    setTaskName('')
   
}

    return (
        <section className="container">
            <pre>
            {taskName}
            {taskDueDate}
            </pre>
    <div className="new_task">
   
        <label for="tasks" className="task-label"></label>
        {/* [] assegnare una variabile di stato al value
        [] assegnare onChange */}

        <input type="text"
        value={taskName} 
        onChange={(evento) => setTaskName(evento.target.value)}
        className="task-control"
        name="tasks" id="tasks" 
        placeholder="add new task/ricerca" />

{!taskName.trim().length>0 ? 'si':'no'}

        <button className="task-button" 
        type="submit"
        onClick={onAddTask}
        disabled = {!taskName.trim().length>0}>Add</button>
      </div>

      <div className="date">
        <input className="date-task"
        value={taskDueDate}
        onChange = {(evento) => setTaskDueDate(evento.target.value)}
        type="date" />
    </div>
</section>
    )
}

export default SearchBar

//NB: ricordare  che dal punto di vista di react il campo di un form deve cambiare il valore della variabile a cui è associato
//per controllare il cambiamento di tale valore react utilizza il metodo useState

//NB ricordare che l'oggetto target dell'evento non è sempre un elemento di input lo è in questo caso poichè l'esercizio è basato su un form
// che inevitabilmente ha lo scopo di inviare input