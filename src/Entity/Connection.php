<?php

namespace Portifolio\Workbench\Entity;

use mysqli;

class Connection
{
    use ConnectionParameters;

    protected mysqli $conn;

    public function __construct()
    {
        // Database connection parameters
        $servername = self::SERVERNAME;
        $username = self::USERNAME;
        $password = self::PASSWORD;
        $database = self::DATABASE;
        $port = self::PORT;

        // Create a connection to the MySQL database
        $this->conn = new mysqli($servername, $username, $password, $database, $port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
