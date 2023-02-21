<?php

//Validate campo obbligatorio, quindi non deve essere vuoto
//false
//
require "./form_in_php/class/validator/ValidateRequired.php";
$testCases = [
    [
        'input' => '       ',

        'expected' => false
    ],

    [

        'input' => 'ciao ',

        'expected' => 'ciao',
    ],
    [

        'input' => ' ciao',

        'expected' => 'ciao',
    ],
    [

        'input' => ' ciao ',

        'expected' => 'ciao',
    ],
    [

        'input' => '',

        'expected' => false,
    ],
    [

        'input' => '<h1>ciao</h1>',

        'expected' => 'ciao',
    ],
    [

        'input' => '<h1></h1>',

        'expected' => false,
    ],
    [

        'input' => '<b> ',

        'expected' => false,
    ],
    [

        'input' => '   <b>',

        'expected' => false,
    ],
    [

        'input' => 'ciao</b>',

        'expected' => "ciao",
    ],
    [

        'input' => '<b>ciao',

        'expected' => "ciao",
    ],
    [

        'input' => '<b>      </b>',

        'expected' => false,
    ],
  
    ];

foreach ($testCases as $key => $test){
    $input = $test['input'];
    $expected = $test ['expected'];

    $v = new ValidateRequired();
    if($v -> isValid($input) != $expected){
        echo "\nTest numero $key non superato mi aspettavo";
        var_dump($expected);
        echo "\nma ho trovato";
        var_dump($v -> isValid($input));
    };

}