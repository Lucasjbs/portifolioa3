<?php

namespace Portifolio\Workbench\Entity;

use mysqli;
use Portifolio\Workbench\Action\Response;

class Connection
{
    use ConnectionParameters;

    protected mysqli $conn;
    protected Response $mysqliResponse;

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

        $this->mysqliResponse = new Response(201, "success", []);
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    public function getMysqliResponse(): Response
    {
        return $this->mysqliResponse;
    }
}
