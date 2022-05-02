<?php

namespace Controllers;

use Services\FoodService;

class HomeController
{

    private $foodService;

    function __construct()
    {
        $this->foodService = new FoodService();
    }


    public function index()
    {
        require __DIR__ . '../../views/Food/homepage.php';
    }
}
