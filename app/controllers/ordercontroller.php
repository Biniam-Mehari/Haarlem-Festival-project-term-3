<?php

namespace Controllers;

use Services\FoodService;
use Services\OrderService;

class OrderController
{

    private $orderService;
    private $foodService;
    private $paymentController;
    private $webhookController;

    function __construct()
    {
        $this->orderService = new OrderService();
        $this->foodService = new FoodService();
        $this->paymentController = new PaymentController();
        //$this->webhookController = new WebhookController();

    }

    public function addOrder()
    {
        if (isset($_GET['addOrder'])) {
            if (!isset($_SESSION['user'])) {
                echo "<script>location.assign('/user/loginview')</script>";
            }

            $user = $_SESSION['user'];
            $orderStatus = "open";
            $order = $this->orderService->InsertOrder($orderStatus, $user->userID);

            $_SESSION['orderID'] = $order->orderID;

            $this->addTicket($order->orderID);
        }
    }

    public function addTicket($orderID)
    {
        $tickets = $_SESSION['reservations'];

        foreach ($tickets as $ticket) {
            if ($ticket['type'] == 'Food') {
                $session = $this->foodService->GetSessionID($ticket['restaurantID'], $ticket['date'], $ticket['time']);
                $this->orderService->InsertTicket($orderID, $session->sessionID, $ticket['type'],  $ticket['quantity'], $ticket['reservationComment']);
            }
        }

        $this->paymentController->InitializeMollie();
        //$this->APImollie();
        //$this->webhookController->updateStatus();

        // echo "<script>location.assign('/food')</script>";
    }
}
