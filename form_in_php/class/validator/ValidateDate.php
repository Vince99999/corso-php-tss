<?php
 class ValidateDate {

public function isValid(string $date) : bool{
    $parametriData=explode("-", $date);
    $anno=$parametriData[0];
    $mese=$parametriData[1];
    $giorno=$parametriData[2];
    
  return  checkdate($mese, $giorno, $anno);

}
 }