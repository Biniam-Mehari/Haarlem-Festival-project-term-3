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
        if (!isset($_SESSION['reservations'])) {
            $_SESSION['reservations'] = array();
        }

        $totalAmount = 0;
        $totalEvents = 0;

        foreach($_SESSION['reservations'] as $event) {
            $totalAmount += $event['totalPrice'];
            $totalEvents++;
        }

          $_SESSION['totalAmount'] = $totalAmount;


        require __DIR__ . '../../views/cart.php';
 
    }

    public function removeItem() {
        if (isset($_POST['removeButton'])) {
            $restaurantID = $_POST['restaurantID'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            foreach($_SESSION['reservations'] as $events=>$values) {
                if ($restaurantID == $values['restaurantID'] && $date == $values['date'] && $time == $values['time']) {
                    unset($_SESSION['reservations'][$events]);
                }
            }
        }

        $this->index();
    }



    public function addToCart() {
        //unset($_SESSION['reservations']);

        if (isset($_POST['reservationFood'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if (!isset($_SESSION['reservations'])) {
                $_SESSION['reservations'] = array();
            }

            $type = 'Food';
            $restaurantID = $_POST['restaurantID'];
            $restaurantName = $_POST['restaurantName'];
            $address = $_POST['address'];
            $image = $_POST['image'];
            $reservationFee = $_POST['reservationFee'];
            $adultAmount = $_POST['adultAmount'];
            $childAmount = $_POST['childAmount'];
            $reservationDate = $_POST['reservationDate'];
            $reservationTime = $_POST['reservationTime'];
            //$sessionDateTime = $reservationDate . "," . $reservationTime;
            $quantity = $adultAmount + $childAmount;

            if (isset($_POST['reservationComment'])) {
                $reservationComment = $_POST['reservationComment'];
            }
            else {
                $reservationComment = "No comment";
            }

            $totalPrice = $quantity * $reservationFee;

            $reservation = array('restaurantID' => $restaurantID, 'restaurantName' => $restaurantName, 'quantity' => $quantity, 'date' => $reservationDate, 'time' => $reservationTime, 'reservationComment' => $reservationComment, 'totalPrice' => $totalPrice, 'address' => $address, 'type' => $type, 'image' => $image);

            array_push($_SESSION['reservations'], $reservation);

            $this->index();

            //var_dump($_SESSION['reservations']);

        }

        
    }

}
