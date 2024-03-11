<?php

namespace Portifolio\Workbench\Entity;

use Exception;

class UserEntity extends Connection
{
    private string $tablename = "userdata";

    public function __construct()
    {
        parent::__construct();
    }

    public function createNewUser(string $name, string $email, string $password): string
    {
        // $sql = "INSERT INTO $this->tablename (name, email, password) VALUES ('$name', '$email', '$password')";

        try {
            // $this->conn->query($sql);
            return "Status: success";
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }
        return "Status: error";
    }

    public function getUserList(): array
    {
        $sql = "SELECT id, email FROM $this->tablename";

        $emailList = [];
        try {
            $result = $this->conn->query($sql);
            $emailList = $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            $exception = $e->getMessage();
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
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }
        return $password;
    }
}
