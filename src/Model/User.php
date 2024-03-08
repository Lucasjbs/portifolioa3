<?php

namespace Portifolio\Workbench\Model;

use Portifolio\Workbench\Entity\UserEntity;
use Portifolio\Workbench\Exception\DuplicatedEmailException;

class User
{
    private string $name;
    private string $email;
    private Password $password;
    private UserEntity $userEntity;

    public function __construct(
        string $name = "",
        string $email = "",
        Password $password = new Password(""),
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->userEntity = new UserEntity;
    }

    public function createNewUser(): void
    {
        $this->checkDuplicatedEmail();

        $this->userEntity->createNewUser(
            $this->name,
            $this->email,
            $this->password->getSafePassword()
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function checkDuplicatedEmail(): void
    {
        $emailList = $this->userEntity->getEmailList();
        foreach ($emailList as $email) {
            if ($this->email == $email['email']) {
                throw new DuplicatedEmailException("Email already exists!");
            }
        }
    }
}
