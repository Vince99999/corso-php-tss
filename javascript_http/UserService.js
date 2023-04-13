// /users.php
const base_url = "http://localhost/corso-php-tss/form_in_php/rest_api";
// NB export comando serve a rendere disponibile la funzione ad altri file js dello stesso progetto
// tramite il comando import che dette funzioni dovranno implementare per richiamare la funzione nominata con export
// da notare che export funziona sia per le funzioni che per delle semplici variabili le quali anche esse potranno essere richiamate tramite il relativo comando import
export function getUser() {
    //console.log("ciao",base_url)
    //in javascript lo strumento che permette di effettuare chiamate http è il fetch
    //prima di fetch si usava xhttp (a volte ancora utilizzato)
    //fetch differisce per il concetto di promessa che a sua volta si spiega con la spiegazione di eventi che si verificano in eventi diversi
    
    const promise = fetch(base_url + "/users.php")

    promise.then((response) => {
        return response.json() //restituisce la promessa
    })
        .then((json) => {
            //DATI DISPONIBILI
            console.log(json);

            const lista = document.getElementById("lista_utenti")
            const elenco = json.map((user) => {

                console.log("sono un utente", user)
                return "<li>" + user.first_name + "</li>"

            }).join("")
            lista.innerHTML = elenco
            console.log(elenco)
        })



}
