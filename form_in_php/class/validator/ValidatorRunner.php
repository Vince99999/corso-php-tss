<?php

namespace validator;


class ValidatorRunner
{
    private $validatorList;
    public function __construct(array $validatorList) {
        $this->validatorList = $validatorList;
    }


    public function getValidatorList()
    {
        return $this-> validatorList;
    }

    public function isValid() 
    {
        foreach ($this->validatorList as $name_attribute => $istance_validator) {
       
            $istance_validator->isValid($_POST[$name_attribute]);
        }
    }


    public function getValid(): bool{
        $all_valid = true;
        foreach ($this->validatorList as $key => $istance_validator) {

            // echo $key."<br>";
            // echo($istance_validator -> isValid());
            // echo "<br>";
            $all_valid = $istance_validator -> getValid() && $all_valid;
        }
         return $all_valid;
    }
}






?>