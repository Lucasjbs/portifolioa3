<?php

namespace Portifolio\Workbench\Model;

use Portifolio\Workbench\Entity\UserEntity;
use Portifolio\Workbench\Exception\DuplicatedEmailException;
use Portifolio\Workbench\Exception\UserLoginException;

class User
{
    private int $id;
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
        // if ($this->emailExists()) {
        //     throw new DuplicatedEmailException("Email already exists!");
        // }

        $this->userEntity->createNewUser(
            $this->name,
            $this->email,
            $this->password->getSafePassword()
        );
    }

    public function checkLoginCredentials(): bool
    {
        if (!$this->emailExists()) {
            throw new UserLoginException("Email does not exists!");
        }

        $passwordDb = $this->userEntity->getPasswordById($this->id);

        if (!$this->password->passwordVerifier($passwordDb)) {
            throw new UserLoginException("Password is wrong!");
        }

        return true;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function emailExists(): bool
    {
        $userDataList = $this->userEntity->getUserList();
        foreach ($userDataList as $data) {
            if ($this->email == $data['email']) {
                $this->id = $data['id'];
                return true;
            }
        }
        return false;
    }
}
