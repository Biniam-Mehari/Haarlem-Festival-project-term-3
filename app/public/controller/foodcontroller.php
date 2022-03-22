<?php

require_once('../DAL/FoodDAL.php');

class FoodController {

    private $foodService;

    function __construct()
    {
        $this->foodService = new FoodDAL();
    }


    public function GetAllRestaurants() {
        try {
            return $this->foodService->GetAllRestaurants();
        }
        catch(Exception $e) {
            echo 'You have an exception: ',  $e->getMessage(), "\n";
        }
    }

    public function GetRestaurantById($id) {
        try {
            return $this->foodService->GetRestaurantById($id);
        }
        catch(Exception $e) {
            echo 'You have an exception: ',  $e->getMessage(), "\n";
        }
    }

    public function GetReceipt($restaurantName, $startTime, $endTime) {
        try {
            return $this->foodService->GetReceipt($restaurantName, $startTime, $endTime);
        }
        catch(Exception $e) {
            echo 'You have an exception: ',  $e->getMessage(), "\n";
        }
    }


}