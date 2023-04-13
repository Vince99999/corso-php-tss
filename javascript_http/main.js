// simile al require di php
//verrà importata la funzione indicata puchè abbia l'export come riferimetno quando creata
//per ogni funzione che si richiama dovrà essere fatto un import diverso anche se sono presenti nello stesso file

import {getUser} from "./UserService_errorFunction.js";

import {UserList, UserTable} from "./RenderView.js"

getUser()
.then((json) => {
    UserList(json, 'lista_utenti-1')
})



const user_locale = [
    {
        "first_name": "Amedeo",
        "last_name": "Verdi",
        "birthday": "2017-03-17",
        "birth_city": "sfdsf",
        "regione_id": 16,
        "provincia_id": 15,
        "gender": "M",
        "username": "giuseppe@xcvxc",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "user_id": 15
    },
   
    {
        "first_name": "Ranuncolo",
        "last_name": "Rivola",
        "birthday": "1999-03-01",
        "birth_city": "sdfdsfs",
        "regione_id": 18,
        "provincia_id": 17,
        "gender": "M",
        "username": "a@b.it",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "user_id": 21
    }
]

UserTable(user_locale, 'lista_utenti-2')

// getUser().then((json)=>{

//     //VIEW
//     alert(json[0])
// })