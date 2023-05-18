<?php

class DatabaseConnection
{
private $host = "localhost";
private $username = "root";
private $password = "123123";
private $dbname = "61THNB";

private $conn;
public function __construct() {
    $conn = new mysqli($this->host,$this->username,$this->password, $this->dbname);
    if($conn->connect_error) {
        die("<h1>Database connect failed</h1>");
    }
     $this->conn = $conn;
}

public function getMysqli() :mysqli {
    return $this->conn;
}

}