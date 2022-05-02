<?php

namespace Repositories;
use PDO;
use PDOException;

class Repository {

    protected $connection;

    function __construct() {

        require __DIR__ . '../../db.php';

        try {
            $this->connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // change pdo mode to exception
        } catch(PDOException $e) {
            echo "Connection to the database has failed: " . $e->getMessage();
        }
    }
}