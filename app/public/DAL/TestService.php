<?php

require_once('../../db.php');
require_once('../model/User.php');

class TestService

{

    private DB $db;

    private $connection;

    public function __construct()

    {

        $this->db = DB::getInstance();

        $this->connection = $this->db->getConnection();

    }

    public function getItems()

    {
        try {

            $login = $this->connection->prepare("SELECT userId, firstName, email  FROM _User");

            $login->execute();

         $result = $login->get_result();
         while ($row = $result->fetch_assoc()) {




            $userId = $row["userId"];

            $firstName = $row["firstName"];

            $email = $row["email"];
            $user = new user($userId,$firstName,$email );
            $results[] = $user;
        
        }

            
            return $results;
        } catch (PDOException $ex) {

            echo "connection failed" . $ex->getMessage();
        }
    }
}
