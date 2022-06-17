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
    private $invoice;

    function __construct()
    {
        $this->orderService = new OrderService();
        $this->foodService = new FoodService();
        $this->paymentController = new PaymentController();
        $this->invoice =new InvoiceController();
        //$this->webhookController = new WebhookController();

    }

    public function addOrder()
    {
        if (isset($_POST['addOrder'])) {
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
            else{
                $this->orderService->InsertTicket($orderID, $ticket['danceID'], $ticket['type'],  $ticket['quantity'], " ");
            }
        }


        // leaving this to rememer to talk about it
        //we try here it does not work
        //$this->invoice->index();
        $this->paymentController->InitializeMollie();
        
        
    }
}
