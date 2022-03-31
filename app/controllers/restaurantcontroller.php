<?php

use Controllers\Controller;
use Services\RestaurantService;

class RestaurantController extends Controller {

    private $restaurantService;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $restaurants = $this->restaurantService->GetAllRestaurantInformation();

            $this->displayView($restaurants);
        }
    }
}