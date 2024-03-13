<?php

namespace Portifolio\Workbench\Entity;

use mysqli_sql_exception;

class UserEntity extends Connection
{
    private string $tablename = "userdata";

    public function __construct()
    {
        parent::__construct();
    }

    public function createNewUser(string $name, string $email, string $password): void
    {
        $sql = "INSERT INTO $this->tablename (name, email, password) VALUES ('$name', '$email', '$password')";

        try {
            $this->conn->query($sql);
        } catch (mysqli_sql_exception $e) {
            $this->mysqliResponse->modifyResponseData(400, $e->getMessage(), ['mysqli_code' => $e->getCode()]);
        }
    }

    public function getUserList(): array
    {
        $sql = "SELECT id, email FROM $this->tablename";

        $emailList = [];
        try {
            $result = $this->conn->query($sql);
            $emailList = $result->fetch_all(MYSQLI_ASSOC);
        } catch (mysqli_sql_exception $e) {
            $this->mysqliResponse->modifyResponseData(400, $e->getMessage(), ['mysqli_code' => $e->getCode()]);
        }
        return $emailList;
    }

    public function getPasswordById(int $id): string
    {
        $sql = "SELECT password FROM $this->tablename WHERE id = $id";

        $password = "";
        try {
            $result = $this->conn->query($sql);
            $result = $result->fetch_assoc();
            $password = $result['password'];
        } catch (mysqli_sql_exception $e) {
            $this->mysqliResponse->modifyResponseData(400, $e->getMessage(), ['mysqli_code' => $e->getCode()]);
        }
        return $password;
    }

    public function getUserDataById(int $id): array
    {
        $sql = "SELECT name, email FROM $this->tablename WHERE id = $id";

        $data = [];
        try {
            $result = $this->conn->query($sql);
            $data = $result->fetch_assoc();
        } catch (mysqli_sql_exception $e) {
            $this->mysqliResponse->modifyResponseData(400, $e->getMessage(), ['mysqli_code' => $e->getCode()]);
        }
        return $data;
    }

    public function checkIfIdExist(int $id): bool
    {
        $sql = "SELECT 1 FROM $this->tablename WHERE id = $id";

        try {
            $result = $this->conn->query($sql);
            $data = $result->fetch_assoc();
            if(isset($data)){
                return true;
            }
        } catch (mysqli_sql_exception $e) {
            $this->mysqliResponse->modifyResponseData(400, $e->getMessage(), ['mysqli_code' => $e->getCode()]);
        }
        return false;
    }
}
