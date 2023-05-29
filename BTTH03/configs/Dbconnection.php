<?php
class Dbconnection{
    private $conn = null;
    public function __construct(){
        //kết nối db
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=phpbook-1;port=3306', 'root','');
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}