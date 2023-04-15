
// le funzioni async restituiscono sempre una promessa
// per identificare queste promesse all'interno della funzione si usa await innanzi a detta promessa
// al di fuori della funzione async per utilizzare i dati forniti dala promessa all'interno della funzione sarà necessario contrassegnare 
// la funzione async richiamata con await
// senza la parola d'ordine await quello che verrà restiuita sarà un oggetto di tipo promessa ma non i dati che la riguardano
// con la parola await innanzi alla funzione async richiamata otterrò invece i dati della promessa e l'oggetto che la compone
const base_url= "http://localhost/corso-php-tss/form_in_php/rest_api"

export async function getUser(){

    const response = await fetch(base_url+"/users.php")
    const json = await response.json();
   // console.log(json);
    return json;
}

const users = await getUser();

console.log(users);

//equivale a 
getUser().then(data =>{
    const user = data
    // Da qui non si esce dalla funzione quindi con then
    // non si potranno usare i dati della promessa al di fuori 
    // della funzione

})





//fetch(base_url+"tasks.php")