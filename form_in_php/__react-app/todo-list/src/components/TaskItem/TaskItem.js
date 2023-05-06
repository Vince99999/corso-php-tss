// con questa sitassi è come se fosse sottointeso che alla costante TaskItem è stato dato
//il valore delle props che ad essa si riferiscono dal progetto react

import { useState } from "react"

// const {TaskItem, done} = props;
//props.done, props.nome_task

function TaskItem ({nome_task, done, id, parentRemoveTask, parentUpdateTask}) {
    const [doneCheckBox, setDoneCheckbox] = useState(done)

    function onRemoveTask() {
      //console.log("task " + id)
      parentRemoveTask(id)
    }

    function onUpdateStatus(event) {
     
      setDoneCheckbox(event.target.checked)
      parentUpdateTask(id)
    }

// la tecnologia che utuilizza react per convertire gli html si chiama jsx
// è possibile trovare su internet dei convertitori di html in jsx per poter 
// compilare i file per utilizzarli in react
    return (
        <div className = {done ? 'task_già_fatta' : ''}>
        <input
          onChange = {onUpdateStatus}
          className = "checkbox"
          checked = {doneCheckBox}
          type="checkbox"
          name="contollo"
          defaultValue="..."
        />
     
        <label htmlFor="datepicker" className="form-label">
          {nome_task}
        </label>
        <button className="button-x" 
                type="submit"
                onClick={onRemoveTask}>X</button>
      </div>
    )
}

export default TaskItem