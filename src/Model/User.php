<?php

namespace Portifolio\Workbench\Model;

use Portifolio\Workbench\Entity\UserEntity;

class User
{
    private string $name;
    private string $email;
    private string $password;
    private UserEntity $userEntity;

    public function __construct(
        string $name = "",
        string $email = "",
        string $password = "",
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->userEntity = new UserEntity;
    }

    public function createNewUser(): void
    {
        $this->userEntity->createNewUser(
            $this->name,
            $this->email,
            $this->password
        );
    }
}
