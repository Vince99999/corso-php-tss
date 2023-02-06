<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
// qualsiasi variabile in php si inizializza con il simbolo $ all'inizio del suo identificativo
        $nome = "Mario";
        $eta = 50;
        $passatempi = array("Tennis", "Cinema", "no sport");

// dichiarazione della funzione
        function saluta ($nome){

            return "Ciao sono $nome, come va?";
            // all'interno di una stringa php riconosce il nome di una variabile al contrario di altri linguaggi di programmazione che per ottenere lo stesso risultato devono utilizzare altri metodi
            // javascript : "ciao sono" + nome + ", come va?"
            // successivamente sempre con javascript : `ciao sono ${nome}, come va?` //template literal  
              }      

              echo "<h1>scrivo un contenuto sullo schermo</h1>";
              //chiamo la funzione
              echo saluta("Gianni");
              //in php il . è l'operatore di concatenazione delle stringhe
              echo "<p>".saluta($nome)."</p>";
              echo "<div>".saluta($nome)."</div>";

                // echo $passatempi non può essere stampato direttamente in quanto dato complesso composto da più stringhe
                //sarà necessario iterare su di esso per mostrarne il contenuto

              //jascript sarebbe : passatempi.length
              //con php sarà necessario una funzione apposita che conta gli elementi in qualcosa di "contabile"
              //nel caso specifico la funzione prevista dallo stesso php è count() con all'interno delle parentesi l'oggetto di cui è necessario contare gli elementi
              echo "<ul>";
              for ($i=0; $i < count($passatempi); $i++) { 
               echo "<li>$passatempi[$i]</li>";
              }

              echo "</ul>"
    ?>

</body>
</html>









