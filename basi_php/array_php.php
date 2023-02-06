<?php

// // ricordare che con le virgolette doppie le variabili possono essere interpretate all'interno di una stringa
// //con gli apici singoli la stringa non interpreta l'eventuale variabile al suo interno
// $nome = "Mario";

// echo "\tciao $nome \n";
// echo '\tciao $nome \n';

// # index array
// // colori = array();
// $colori = ["red", "green", "blu"];

// echo "\n\n".$colori[2]."\n";

// #associative array
// $persona = [
//     'email' => "a@b.it",
//     "nome" => "Mario",
//     "cognome" => "Rossi",
// ];


// print_r($persona);

// echo $persona ['email'];

/** Da errpre array to string conversion */

// echo $persona; 

$classe = array(
    [
        'email' => "a@b.it",
        "nome" => "Mario",
        "cognome" => "Rossi",
    ],
    [

        'email' => "c@d.it",
        "nome" => "Giovanni",
        "cognome" => "Verdi",

    ]
);

//print_r($classe[0]['nome']);

# stile di programmazione imperativo
echo"For loop\n";
for ($i=0; $i < count($classe); $i++) { 
$allievo=$classe[$i];
echo $allievo['nome']."\n";
}

echo"----------------------\n";
echo"Foreach loop\n";
foreach ($classe as $i => $allievo) {
    echo ($i+1).") ".$allievo['nome'];
    echo "\n";
}

# stile di programmazione dichiarativo / funzionale
echo"----------------------\n";
echo "map di un array\n";
function stampaNome($allievo){
    echo $allievo['nome']."\n";
}

array_map('stampaNome', $classe);




//var_dump($persona);

