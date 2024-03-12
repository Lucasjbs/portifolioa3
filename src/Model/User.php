<?php

namespace Portifolio\Workbench\Model;

use Portifolio\Workbench\Entity\UserEntity;
use Portifolio\Workbench\Exception\DuplicatedEmailException;
use Portifolio\Workbench\Exception\UserEntityException;
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
        //     throw new DuplicatedEmailException();
        // }

        $this->userEntity->createNewUser(
            $this->name,
            $this->email,
            $this->password->getSafePassword()
        );

        $this->catchMysqlException();
    }

    public function checkLoginCredentials(): bool
    {
        $isEmailValid = $this->checkUserEmailAndSetIdIfValid();

        if (!$isEmailValid) {
            throw new UserLoginException("This email doesn't exist!");
        }

        $passwordDb = $this->userEntity->getPasswordById($this->id);
        $this->catchMysqlException();

        if (!$this->password->passwordVerifier($passwordDb)) {
            throw new UserLoginException("Your password is wrong!");
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

    private function checkUserEmailAndSetIdIfValid(): bool
    {
        $userDataList = $this->userEntity->getUserList();
        $this->catchMysqlException();

        foreach ($userDataList as $data) {
            if ($this->email == $data['email']) {
                $this->id = $data['id'];
                return true;
            }
        }
        return false;
    }

    private function catchMysqlException(): void
    {
        $response = $this->userEntity->getMysqliResponse();
        if ($response->getCode() == 400 && $response->getData()['mysqli_code']) {
            throw new UserEntityException("MySql error!");
        }
    }
}
