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
            $istance_validator->isValid($_POST['name_attribute']);
        }
    }
}






?>