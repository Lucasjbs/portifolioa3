<?php

namespace Portifolio\Workbench\Validation;

use Portifolio\Workbench\Exception\InvalidPasswordException;
use Portifolio\Workbench\Model\Password;

class PasswordValidation
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function validatePassword(): Password
    {
        if (strlen($this->password) < 8 || strlen($this->password) > 40) {
            throw new InvalidPasswordException("Password lenght is invalid!");
        }

        if (preg_match('/[$#\/@:;\-<>\(\)\[\]\{\}]/', $this->password)) {
            throw new InvalidPasswordException("Password cannot contain special characters!");
        }

        $passwordObject = new Password($this->password);
        return $passwordObject;
    }
}
