<?php

namespace Controllers;

use Services\FoodService;
use Services\OrderService;

class OrderController
{

    private $orderService;
    private $foodService;

    function __construct()
    {
        $this->orderService = new OrderService();
        $this->foodService = new FoodService();
    }


    public function index()
    {
        $restaurants = $this->foodService->GetAllRestaurantInformation();
        require __DIR__ . '../../views/Food/foodmain.php';
    }

    public function addOrder() {
        if (isset($_GET['addOrder'])) {
            if (!isset($_SESSION['user'])) {
                echo "<script>location.assign('/user/loginview')</script>";
            }

            $user = $_SESSION['user'];
            $orderStatus = "open";
            $order = $this->orderService->InsertOrder($orderStatus, $user->userID);

            $this->addTicket($order->orderID);
        }
    }

    public function addTicket($orderID) {
        $tickets = $_SESSION['reservations'];

        foreach($tickets as $ticket) {
            if ($ticket['type'] == 'Food') {
                $session = $this->foodService->GetSessionID($ticket['restaurantID'], $ticket['date'], $ticket['time']);
                $this->orderService->InsertTicket($orderID, $session->sessionID, $ticket['type'],  $ticket['quantity'], $ticket['reservationComment']);
            }
        }

       // echo "<script>location.assign('/food')</script>";
    }

}
