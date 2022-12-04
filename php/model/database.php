<?php

abstract class DBConn
{
    private $hostname = "localhost";
    private $dbUsername = "root";
    protected $dbPassword = "";
    private $dbName = "device_db";

    public function set_connection()
    {
        try {
            //code...
            $dsn = "mysql:hostname= " . $this->hostname . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        } catch (PDOException $th) {
            //throw $th;
            die('ERROR : ' . $th->getMessage() . "<br>");
        }
    }
}
