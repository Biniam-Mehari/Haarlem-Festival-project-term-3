<?php

require_once('../DAL/Restaurant.php');

class RestaurantController {

    private $restaurantService;

    function __construct()
    {
        $this->restaurantService = new RestaurantDAL();
    }


    public function GetAllRestaurants() {
        try {
            return $this->restaurantService->GetAllRestaurants();
        }
        catch(Exception $e) {
            echo 'You have an exception: ',  $e->getMessage(), "\n";
        }
    }

}