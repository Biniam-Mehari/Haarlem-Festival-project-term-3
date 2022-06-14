<?php

namespace Controllers;

use Services\FoodService;

class FoodController
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

    public function foodreservation()
    {
        $restaurantID = $_GET['restaurantID'];
        $restaurantInformation = $this->foodService->GetRestaurantInformationByID($_GET['restaurantID']);
        // $sessionInformation = $this->foodService->GetSessionInformationByRestaurantID($_GET['restaurantID']);
        $restaurantDateForSessions = $this->foodService->GetSessionsDateByRestaurantID($_GET['restaurantID']);
        $restaurantTimeForSessions = $this->foodService->GetSessionsTimeByRestaurantID($_GET['restaurantID']);
        require __DIR__ . '../../views/Food/foodreservation.php';
    }

    public function fillSessionTime()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $json = file_get_contents('php://input');

            if (isset($_POST['reservationDate'])) {

                $restaurantID = $_GET['restaurantID'];
                $sessionDate = $_GET['reservationDate'];
                $sessionTimes = $this->foodService->GetSessionTimesByDateAndRestaurantID($sessionDate, $restaurantID);

                
                echo $sessionTimes;

                print_r(json_encode(["result" => true]));
            }
        }
    }
}
