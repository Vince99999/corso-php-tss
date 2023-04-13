// "lista utenti"
// json | json.data | ciccio
// UsersList(json)
// UsersList(json.data)
// UsersList(ciccio)


export function UserList(array_users, element_selector) {

    const lista = document.getElementById(element_selector)
    const elenco = array_users.map((user) => {

        console.log("sono un utente", user)
        return "<li>" + user.first_name + "</li>"

    }).join("")
    lista.innerHTML = elenco

}

//UserTable() con le parentesi la funzione all'interno della variabile verrà eseguita
//con la sintassi sottostante si chiamerà Function Expression
//se successivamente una funzione venisse dichiarata con lo stesso nome della variabile che contiene la variabile
//se si è dichiarata la variabile con const lo script genererà un errore (ovviamente il comportamento sarà diverso se la variabile è stata dichiarata con var)
//sintassi alternative:
//- const UserTable = function (){} 
//- const UserTable = function Table (){}

const UserTable = (array_users, element_selector) => {

    const tr_users = array_users.map((user) => {
        return `<tr>
                   <td>
                       ${user.first_name}
                   </td>
               </tr>`
    }).join("")

// la seguente sintassi 
// che verrà usata successivamente come è stata usata anche prima
//è utile per inserrie la variabile precedentemente definita 
//all'interno della stringa
//${tr_users}


    //Template literal = ``
    const html = `<table border ="1" width="100%">
            <tr>
                <th>
                        Nome
                </th>
            </tr>

  ${tr_users}

        </table>`

    document.getElementById(element_selector).innerHTML = html

}

//la sintassi dell'export può essere anche realizzata mettendo alla fine del file export e fra parentesi {} le funzioni da esportare

//export{UserList}

// le due sintassi a fianco alla funzione o alla fine del file sono alternative, usate insieme genereranno un errore

export { UserTable }