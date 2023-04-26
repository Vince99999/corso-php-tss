// con questa sitassi è come se fosse sottointeso che alla costante TaskItem è stato dato
//il valore delle props che ad essa si riferiscono dal progetto react

// const {TaskItem, done} = props;
//props.done, props.nome_task

function TaskItem ({nome_task, done}) {
    // la tecnologia che utuilizza react per convertire gli html si chiama jsx
    // è possibile trovare su internet dei convertitori di html in jsx per poter 
    // compilare i file per utilizzarli in react
    return (
        <div className={done ? 'task_già_fatta' : ''}>
        <input
          className="checkbox"
          checked = {done}
          type="checkbox"
          name="contollo"
          defaultValue="..."
        />
        <label htmlFor="datepicker" className="form-label">
          {nome_task}
        </label>
        <button className="button-x" type="submit">
          X
        </button>
      </div>
      
    )
}

export default TaskItem