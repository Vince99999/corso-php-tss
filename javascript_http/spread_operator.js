



const primari_additivi = ["rosso", "verde", "blue"];

const primari_sottrattivi = ["cyano", "magente", "giallo"];


// console.log("rosso", "verde", "blu")

// console.log(...colori)
// console.log("rosso", "verde", "blue", "cyano", "magente", "giallo")
const tutti_colori_primari = [...primari_additivi, ... primari_sottrattivi];
//... = spread operator
console.log (tutti_colori_primari)


const primari_additivi_pink = ["pink",...primari_additivi]
console.log (primari_additivi_pink)

const nuovo = "orange";
const primari_additivi_pink_orange = ["pink",...primari_additivi, nuovo]
console.log(primari_additivi_pink_orange)

const spelling_nuovo = [...nuovo];
console.log(spelling_nuovo)

//la funzione dello spread operator è quella di spacchettare le informazioni
//all'interno di un gruppo di dati separati da virgola
//la sintassi delle parentesi andrà mantenuta
//per esempio negli array si manterrannole [] mentre per gli oggetti si utilizzeranno le {}

const persona = {
    nome:"mario",
    cognome: "rossi"
}


const persona_2 =  {...persona, 
    ...{"voti": [6,7,3]}
} 

persona_2.indirizzo= "Via novara 33"


console.log(persona)

console.log(persona_2)