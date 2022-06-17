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

        foreach ($_SESSION['reservations'] as $event) {
            $totalAmount += $event['totalPrice'];
            $totalEvents++;
        }



        $_SESSION['totalAmount'] = $totalAmount;


        require __DIR__ . '../../views/shoppingcart.php';
    }


    public function changeQuantity()
    {
        if (isset($_POST['subtractQuantityFood']) || isset($_POST['addQuantityFood'])) {
            $restaurantID = $_POST['restaurantID'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $reservationFee = $_POST['reservationFee'];
            foreach ($_SESSION['reservations'] as $events => $values) {
                if ("Food" == $values['type']) {
                    if (isset($_POST['addQuantityFood'])) {
                        if ($restaurantID == $values['restaurantID'] && $date == $values['date'] && $time == $values['time']) {
                            $_SESSION['reservations'][$events]['quantity'] += 1;
                            $newPrice = $_SESSION['reservations'][$events]['quantity'] * $reservationFee;
                            $_SESSION['reservations'][$events]['totalPrice'] = $newPrice;
                        }
                    } else if (isset($_POST['subtractQuantityFood'])) {
                        if ($restaurantID == $values['restaurantID'] && $date == $values['date'] && $time == $values['time']) {
                            $_SESSION['reservations'][$events]['quantity'] -= 1;
                            $newPrice = $_SESSION['reservations'][$events]['quantity'] * $reservationFee;
                            $_SESSION['reservations'][$events]['totalPrice'] = $newPrice;
                        }

                        if ($_SESSION['reservations'][$events]['quantity'] == 0) {
                            unset($_SESSION['reservations'][$events]);
                        }
                    }
                }
            }
            $this->index();
        } elseif (isset($_POST['subtractQuantityDance']) || isset($_POST['addQuantityDance'])) {
            $danceID = $_POST['danceID'];
            $price = $_POST['price'];

            foreach ($_SESSION['reservations'] as $events => $values) {
                if ("Dance" == $values['type']) {
                    if (isset($_POST['addQuantityDance'])) {
                        if ($danceID == $values['danceID']) {
                            $_SESSION['reservations'][$events]['quantity'] += 1;
                            $newPrice = $_SESSION['reservations'][$events]['quantity'] * $price;
                            $_SESSION['reservations'][$events]['totalPrice'] = $newPrice;
                        }
                    } else if (isset($_POST['subtractQuantityDance'])) {
                        if ($danceID == $values['danceID']) {
                            $_SESSION['reservations'][$events]['quantity'] -= 1;
                            $newPrice = $_SESSION['reservations'][$events]['quantity'] * $price;
                            $_SESSION['reservations'][$events]['totalPrice'] = $newPrice; // check this
                        }

                        if ($_SESSION['reservations'][$events]['quantity'] == 0) {
                            unset($_SESSION['reservations'][$events]);
                        }
                    }
                }
            }
            $this->index();
        }
    }


    public function removeAll()
    {
        if (isset($_POST['removeAllButton'])) {
            unset($_SESSION['reservations']);
        }
        $this->index();
    }

    public function removeItem()
    {
        if (isset($_POST['removeButton'])) {
            $restaurantID = $_POST['restaurantID'];
            $date = $_POST['date'];
            $time = $_POST['time'];

            foreach ($_SESSION['reservations'] as $events => $values) {
                if ("Food" == $values['type']) {
                    if ($restaurantID == $values['restaurantID'] && $date == $values['date'] && $time == $values['time']) {
                        unset($_SESSION['reservations'][$events]);
                    }
                }
            }
        }

        if (isset($_POST['removeButtonDance'])) {
            $danceID = $_POST['danceID'];


            foreach ($_SESSION['reservations'] as $events => $values) {
                if ("Dance" == $values['type']) {
                    if ($danceID == $values['danceID']) {
                        unset($_SESSION['reservations'][$events]);
                    }
                }
            }
        }

        $this->index();
    }




    public function addToCart()
    {
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
            } else {
                $reservationComment = "No comment";
            }

            // check if the same item exists, if so, add it
            foreach ($_SESSION['reservations'] as $events => $values) {
                if ($type == $values['type']) {
                    if ($restaurantID == $values['restaurantID'] && $reservationDate == $values['date'] && $reservationTime == $values['time']) {
                        $quantity += $values['quantity'];
                        unset($_SESSION['reservations'][$events]);
                    }
                }
            }

            $totalPrice = $quantity * $reservationFee;

            $reservation = array('restaurantID' => $restaurantID, 'restaurantName' => $restaurantName, 'quantity' => $quantity, 'date' => $reservationDate, 'time' => $reservationTime, 'reservationComment' => $reservationComment, 'totalPrice' => $totalPrice, 'address' => $address, 'type' => $type, 'image' => $image, 'price' => $reservationFee);

            array_push($_SESSION['reservations'], $reservation);

            $this->index();

            //var_dump($_SESSION['reservations']);

        }


        if (isset($_POST['danceReservation'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            if (!isset($_SESSION['reservations'])) {
                $_SESSION['reservations'] = array();
            }
            $type = 'Dance';
            $danceID = $_POST['danceID'];
            $venueName = $_POST['venueName'];
            $artistName = $_POST['artistName'];
            $date = $_POST['date'];
            $startTime = $_POST['startTime'];
            $venueAdress = $_POST['venueAdress'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $image = $_POST['image'];

            // check if the same item exists, if so, add it
            foreach ($_SESSION['reservations'] as $events => $values) {
                if ($type == $values['type']) {
                    if ($danceID == $values['danceID']) {
                        $amount += $values['quantity'];
                        unset($_SESSION['reservations'][$events]);
                    }
                }
            }

            $totalPrice = $amount * $price;

            $reservation = array('danceID' => $danceID, 'venueName' => $venueName, 'artistName' => $artistName, 'date' => $date, 'startTime' => $startTime, 'venueAddress' => $venueAdress, 'totalPrice' => $totalPrice, 'price' => $price, 'type' => $type, 'quantity' => $amount, 'image' => $image);

            array_push($_SESSION['reservations'], $reservation);

            $this->index();

            //var_dump($_SESSION['reservations']);
        }
    }
}
