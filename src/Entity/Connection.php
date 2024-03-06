<?php

namespace Portifolio\Workbench\Entity;

use mysqli;

class Connection
{
    protected mysqli $conn;

    public function __construct()
    {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "admin";
        $database = "portifolioa3";
        $port = 3306;

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
