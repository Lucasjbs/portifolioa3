<?php

namespace Portifolio\Workbench\Model;

use Portifolio\Workbench\Entity\UserEntity;
use Portifolio\Workbench\Exception\AdminUserException;
use Portifolio\Workbench\Exception\DuplicatedEmailException;
use Portifolio\Workbench\Exception\InvalidSessionException;
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
        $doEmailExists = $this->checkUserEmailAndSetIdIfExists();
        if ($doEmailExists) {
            throw new DuplicatedEmailException();
        }

        $this->userEntity->createNewUser(
            $this->name,
            $this->email,
            $this->password->getSafePassword()
        );

        $this->catchMysqlException();
    }

    public function checkLoginCredentials(): bool
    {
        $doEmailExists = $this->checkUserEmailAndSetIdIfExists();

        if (!$doEmailExists) {
            throw new UserLoginException("This email doesn't exist!");
        }

        $passwordDb = $this->userEntity->getPasswordById($this->id);
        $this->catchMysqlException();

        if (!$this->password->passwordVerifier($passwordDb)) {
            throw new UserLoginException("Your password is wrong!");
        }
        return true;
    }

    public function getUserData(int $id): array
    {
        $userdata = $this->userEntity->getUserDataById($id);
        $this->catchMysqlException();

        if (!$userdata) {
            throw new InvalidSessionException("This session is invalid!");
        }
        return $userdata;
    }

    public function validateUserId(int $id): void
    {
        $userdata = $this->userEntity->checkIfIdExist($id);
        $this->catchMysqlException();

        if (!$userdata) {
            throw new InvalidSessionException("This session doesn't exists!");
        }
    }

    public function checkAdminStatus(int $id): void
    {
        $userdata = $this->userEntity->checkIfUserIsAdmin($id);
        $this->catchMysqlException();

        if (!$userdata) {
            throw new AdminUserException("This user is not admin!");
        }
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

    private function checkUserEmailAndSetIdIfExists(): bool
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
