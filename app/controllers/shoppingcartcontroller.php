<?php

namespace Controllers;

use Services\FoodService;

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

class ShoppingCartController
{

    private $foodService;

    function __construct()
    {
        $this->foodService = new FoodService();
    }


    public function index()
    {
        require __DIR__ . '../../views/Food/foodmain.php';
    }

    public function insertReservationToCart() {
        if (isset($_POST['reservationFood'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if (!isset($_SESSION['user'])) {
                echo "<script>location.assign('/user/loginview')</script>";
            }

            if (!isset($_SESSION['reservations'])) {
                $_SESSION['reservations'] = array();
            }


            $restaurantID = $_GET['restaurantID'];
            $adultAmount = $_POST['adultAmount'];
            $childAmount = $_POST['childAmount'];
            $reservationDate = $_POST['reservationDate'];
            $reservationTime = $_POST['reservationTime'];
            $sessionDateTime = $reservationDate . "," . $reservationTime;
            $quantity = $adultAmount + $childAmount;

            if (isset($_POST['reservationComment'])) {
                $reservationComment = $_POST['reservationComment'];
            }
            else {
                $reservationComment = "No comment";
            }


            $reservation = array('id' => $restaurantID, 'adultAmount' => $adultAmount, 'childAmount' => $childAmount, 'datetime' => $sessionDateTime, 'reservationComment' => $reservationComment);

            array_push($_SESSION['reservations'], $reservation);

            echo "<script>location.assign('/user/food')</script>";
        }
    }

}
