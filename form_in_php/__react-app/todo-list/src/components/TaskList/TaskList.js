const TaskList = (props) => {

return (
    //fragment <></> tag che esiste solo in react
    <>
    <h3 className = "task_list __header"> {props.header} {props.task} </h3>
<ul className = "task_list__"> 
{props.children}
</ul>
    </>
)


}


export default TaskList