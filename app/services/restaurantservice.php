<?php

namespace Services;
use Repositories\RestaurantRepository;

// service treats repository as the DAL layer and calls the methods from there

class RestaurantService {

    private $restaurantRepository;

    function __construct() {
        $this->restaurantRepository = new RestaurantRepository();
    }

    public function GetAllRestaurantInformation() {
        return $this->restaurantRepository->GetAllRestaurantInformation();
    }
}
