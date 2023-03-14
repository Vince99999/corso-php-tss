<?php
//require "./form_in_php/class/validator/Validable.php";
namespace validator;
 class ValidateDate implements Validable{

// public function isValid($date) : bool{

//     $parametriData=explode("-", $date);
//     if (isset($parametriData)){
//     $anno=$parametriData[0];
//     $mese=$parametriData[1];
//     $giorno=$parametriData[2];
//     return  checkdate($mese, $giorno, $anno);
//   }else{

//     return false;
//     }
//   }
// }

public function isValid($value){
{
  $sanitize = trim(strip_tags($value));
  $dt = \DateTime :: createFromFormat('d/m/Y', $sanitize);
echo $value."\n";
  print_r($dt->format('d/m/Y'));
  


  if($dt && $dt->format('d/m/Y') === $sanitize){
    return $dt->format('d/m/Y');
  }else{
    return false;
  };
}




}
public function getMessage()
{
  return 'data non valida';
}

public function getValid(){

}

 }
