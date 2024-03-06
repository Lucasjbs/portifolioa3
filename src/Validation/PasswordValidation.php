<?php

namespace Portifolio\Workbench\Validation;

class PasswordValidation
{
    
    private string $password;

    public function __construct(string $password) {
        $this->password = $password;
    }

    public function validatePassword() : string
    {
        //validate
        $this->passwordEncryptor();
        return $this->password;
    }

    public function passwordDecryptor() : string
    {
        return $this->password;
    }

    //validate $password

    private function passwordEncryptor(): void
    {
        // $this->password = 
    }
}