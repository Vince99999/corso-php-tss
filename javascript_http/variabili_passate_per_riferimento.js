
// variabili passate per riferimento
 const a = [1,2,3,4];
 const b = a;
 b.push("z");
 console.log(a)


//variabili passate con lo spread operator (che punterà una nuova zona di memoria)
//alla variabile a questa volta non verrà aggiunta una nuova z ma rimarrà invariata
//poichè la variabile b_nuovo punterà ad una nuova zona di memoria
const b_nuovo = [...a];
b_nuovo.push("z");
console.log(a)
