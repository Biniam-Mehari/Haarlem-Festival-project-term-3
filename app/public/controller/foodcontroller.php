<?php

require_once('../DAL/FoodDAL.php');

class FoodController {
    private $foodService;

    function __construct()
    {
        $this->foodService = new FoodService();
    }

    public function getRest() {
        //return $restaurants = $this->foodService->getRest(); // all res
    }


    public function getRestaurantById($restaurantID) {
        if (is_null($restaurantID)) {

        }
    }
}