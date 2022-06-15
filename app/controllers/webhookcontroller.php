<?php

namespace Controllers;
use Services\OrderService;

class WebhookController {

    private $orderService;

    function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function updateStatus() {
        $orderID = $_SESSION['orderID'];
        $this->orderService->updateOrderStatus($orderID, 'paid');
    }

    public function index() {
        try {

            //require_once ("../vendor/autoload.php");
        
            require ("../vendor/mollie/mollie-api-php/examples/initialize.php");
        

            $payment = $mollie->payments->get($_POST["id"]);
            $orderID = $payment->metadata->orderID;
            //$orderID = $_SESSION['orderID'];
        
        
            if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {

                $this->orderService->updateOrderStatus($orderID, 'paid');
        
            } elseif ($payment->isOpen()) {

                $this->orderService->updateOrderStatus($orderID, 'open');
        
            } elseif ($payment->isPending()) {

                $this->orderService->updateOrderStatus($orderID, 'pending');
            } elseif ($payment->isFailed()) {

                $this->orderService->updateOrderStatus($orderID, 'failed');
            } elseif ($payment->isExpired()) {

                $this->orderService->updateOrderStatus($orderID, 'expired');
            } elseif ($payment->isCanceled()) {
 
                $this->orderService->updateOrderStatus($orderID, 'canceled');
            } elseif ($payment->hasRefunds()) {

                $this->orderService->updateOrderStatus($orderID, 'refunded');
        
            } elseif ($payment->hasChargebacks()) {

                $this->orderService->updateOrderStatus($orderID, 'charged back');
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }


}

