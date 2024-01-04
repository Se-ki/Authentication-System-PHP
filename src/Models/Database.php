<?php

namespace Src\Models;

use PDO;

class Database
{
    public $connection;
    public $statement;
    public function __construct($username = "root", $password = "")
    {
        $database = [
            "host" => "localhost",
            "user" => "root",
            "port" => 3306,
            "dbname" => "securitydb",
            "charset" => "utf8mb4",
        ];
        $dsn = "mysql: " . http_build_query($database, '', ";");
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }
    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function find()
    {
        return $this->statement->fetch();
    }
}
