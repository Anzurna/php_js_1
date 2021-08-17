<?php
namespace Src\System;

class DatabaseConnector {

    private $dbConnection;

    public function __construct()
    {
        $host = "localhost";
        $port = "3306";
        $db   = "test_db";
        $user = "test_user";
        $pass = "Testing89";

        // try {
        $this->dbConnection = new \PDO(
            "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
            $user,
            $pass
        );
        // } catch (\PDOException $e) {
        //     exit($e->getMessage());
        // }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}