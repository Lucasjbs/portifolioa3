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

    public function getEmailList(): array
    {
        $sql = "SELECT email FROM $this->tablename";

        $emailList = [];
        try {
            $result = $this->conn->query($sql);
            $emailList = $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }
        return $emailList;
    }

    public function createNewUser(string $name, string $email, string $password): string
    {
        $sql = "INSERT INTO $this->tablename (name, email, password) VALUES ('$name', '$email', '$password')";

        try {
            $this->conn->query($sql);
            return "Status: success";
        } catch (Exception $e) {
            $exception = $e->getMessage();
        }
        return "Status: error";
    }
}
