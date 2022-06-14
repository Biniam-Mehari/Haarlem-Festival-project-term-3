<?php

namespace Controllers;

use Services\FoodService;

class PaymentController
{

    private $foodService;

    function __construct()
    {
        $this->foodService = new FoodService();
    }


    public function index()
    {
        $restaurants = $this->foodService->GetAllRestaurantInformation();
        require __DIR__ . '../../views/Food/foodmain.php';
    }

}
