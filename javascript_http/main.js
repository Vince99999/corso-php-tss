
import{ UserTable } from "./RenderView.js"
import{ getUser } from "./UserService_errorFunction.js";



const users = await getUser()

console.log(users.data)
UserTable(users.data, 'lista_utenti-2')
UserList(users.data, 'lista_utenti-1')