
export const addTask = (newTask, todos) => {


    //creazione di eccezioni personalizzate per controllare
    //la completezza dell'informazione passata al metodo
    console.log(newTask.name)
    if (newTask.name === undefined || newTask.name.trim() === "") {
        throw new Error("manca il nome alla task")
    }



    //pattern dell'immutabilità:
    //-fai una copia (shallow copy o copia leggera tramite lo spread operator (rappresentato dai ...))
    const todosCopy = new Array(...todos)
    const newTaskCopy = { ...newTask, ...{ name: newTask.name.trim() } }
    //Nell'ultima operazione effettuata si sostituisce la proprietà name dell'oggetto copiato con la proprietà
    //modificata tramite la funziona trim(); questo è possibile perchè la proprietà name pur essendo gia presente 
    //all'interno dell'oggetto newTask viene sostiuita dall'ultima proprietà con lo stesso nome instanziata
    //per ultima, e l'ultima è quella modificata dopo aver utilizzato lo spread operator su newTask
    //quindi la proprietà name ottenuta tramite ...newTask verrà sostituita dalla proprietà name definita
    //nella stessa istanza tramite ...{name: newTask.name.trim()} che NB dovrà comunque avere lo spread operator davanti per essere definita

    //NB come regola generale dunque la caratteristica di una classe definita per ultima prevale sulle prime



    //-cambia la copia
    newTaskCopy.id = (new Date()).getTime()
    todosCopy.push(newTaskCopy)
    //-restituisci la copia mutata
    return todosCopy

    //cambiare direttamente l'originale come nel modo seguente
    // risulterebbe deprecato per il pattern dell'immutabilità
    //todos.push(newTask)
}

export const removeTask = (task_id, todos) => {
    const todosCopy = new Array(...todos)
    const indexToRemove = todosCopy.findIndex(task => task.id === task_id);
    todosCopy.splice(indexToRemove, 1)
    //console.log(indexToRemove)
    return todosCopy
}

export const updateTaskbyid = (id, todos) => {
    const todosCopy = new Array(...todos)
    const qualcosa = todosCopy.map(task => {
        if (task.id === id) {
            task.done = !task.done
        }
        return task
    })
    return qualcosa;
}





export const activeFilter = (todos) => {
    // filter restituisce tutto ciò che da come risultato true nella funzione di call back
    // in questo caso, come previsto nella maniera sottostante, done = false da come risultato true
    return todos.filter(task => !task.done)

    // NB: filter se utilizzato in maniera generica in modo da far tornare tutto l'argomento restituisce sempre una copia dell'oggetto al pari dello spread operator ... 

}

export const completedFilter = todos => todos.filter(task => task.done)

export const dateFilter = () => { }


//API
// chiamate HTTP
const baseUrl = "http://localhost/corso-php-tss/form_in_php/rest_api/tasks.php";
//const baseUrl = "http://localhost/corso-php-tss/form_in_php/tasks.php"



export const getTaskApi = () => {

    return fetch(baseUrl).then(res => res.json())

}


export const addTaskApi = (newTask) => {
    let headersList = {
        "Accept": "*/*",
        "User-Agent": "Thunder Client (https://www.thunderclient.com)",
        "Content-Type": "application/json"
    }

    let bodyContent = JSON.stringify(newTask);

    return fetch(baseUrl, {
        method: "POST",
        body: bodyContent,
        headers: headersList
    }).then(response => response.json());

}