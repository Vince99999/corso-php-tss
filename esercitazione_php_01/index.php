<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- Scrivere una funzione "array2ul" che dato un array come argomento
restituisce una stringa 

/**
return una stringa che rappresenta un elenco html (ul)
 */
String array2ul(Array $array)

echo array2ul(array("rosso","verde")); -->

<!-- <ul>
    <li>rosso</li>
    <li>verde</li>
</ul> -->

<body>
<?php

        $colori = array("rosso", "verde", "blu");

        function array2ul($array){
            $elementi= "<ul>";
        for ($i=0; $i < count($array); $i++) { 
                 $elementi .= "<li>$array[$i]</li>";
            }
                $elementi .= "</ul>";
            return $elementi;

              }      

            echo array2ul ($colori);
             
    ?>
</body>
</html>