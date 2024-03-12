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

    public function validatePassword(): void
    {
        if (strlen($this->password) < 8 || strlen($this->password) > 40) {
            throw new InvalidPasswordException("Password length must be between 8 and 40 characters!");
        }

        if (preg_match('/[$#\/@:;\-<>\(\)\[\]\{\}]/', $this->password)) {
            throw new InvalidPasswordException("Password cannot contain special characters!");
        }
    }

    public function getSafePasswordObject(): Password
    {
        $passwordObject = new Password($this->password);
        return $passwordObject;
    }

    public function getRawPasswordObject(): Password
    {
        $passwordObject = new Password($this->password, Password::RAW);
        return $passwordObject;
    }
}
