<?php

use validator\ValidateDate;

require "./form_in_php/class/validator/ValidateDate.php";
$testCases = [
    [
        'input' => '33/09/1975',

        'expected' => false
    ],
    [
        'input' => ' 03/09/1975',

        'expected' => '03/09/1975'
    ],
      [
        'input' => '03/09/1975 ',

        'expected' => '03/09/1975'
    ],
     [
        'input' => '<br>03/09/1975 ',

         'expected' => '03/09/1975'
     ],
    [
        'input' => ' 03/09/1975</br>',

        'expected' => '03/09/1975'
    ],
    [
        'input' =>  '<br> 03/09/1975</br>' ,

        'expected' => '03/09/1975'
    ],
    [
        'input' => '<br> 03/09/1975 </br> ' ,

        'expected' => '03/09/1975'
    ],
    [
        'input' => ' 01/01/1900' ,

        'expected' => '01/01/1900'
    ],
    [
        'input' => '01/01/<b>1900</b>' ,

        'expected' => '01/01/1900'
    ],
  
    ];

foreach ($testCases as $key => $test){
  
    $input = $test['input'];
    $expected = $test ['expected'];

    $v = new ValidateDate();
    if($v -> isValid($input) != $expected){
        echo "\nTest numero $key non superato mi aspettavo";
        var_dump($expected);
        echo "\nma ho trovato";
        var_dump($v -> isValid($input));
    };

}













?>