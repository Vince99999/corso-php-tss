<?php


spl_autoload_register(function($className){

 //   C:\xampp\htdocs\corso-php-tss\form_in_php\class

$className= str_replace("\\", "/",__DIR__."/class/".$className.".php");
require $className;

//require "./class/"

});
