<?php
require_once('../../db.php');
require_once('../model/food.php');


class FoodService {
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = DB::getInstance();
        $this->connection = $this->db->getConnection();
    }

    public function getAllRestaurants() {
        
    }
}