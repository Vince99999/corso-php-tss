<?php
use PHPUnit\Framework\TestCase;

// è necessario il nome del metodi presente in "php unit" sia nel nome della classe che nel nome dei metodi
// da fare eseguire automanticamente dal framawork ("php unit")

class SommaTest extends TestCase{

public function test_somma ()
{
    //una classe o funzione da testare poi assert che contiene vari metodi di controllo
    $this -> assertEquals(10, 5+5, 'ok 5+5 fa 10');


    $colori = ['a' , 'b' , 'c'];

    $this -> assertCount(3, $colori);
    $this -> assertEquals(3, count($colori));
  
}

}

?>