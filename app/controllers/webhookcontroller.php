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
           // $orderID = $payment->metadata->orderID;
            $orderID = $_SESSION['orderID'];
        
        
            if ($payment->isPaid() && ! $payment->hasRefunds() && ! $payment->hasChargebacks()) {
                /*
                 * The payment is paid and isn't refunded or charged back.
                 * At this point you'd probably want to start the process of delivering the product to the customer.
                 */
                
                $this->orderService->updateOrderStatus($orderID, 'paid');
                //require_once('ticketPDF.php');
        
            } elseif ($payment->isOpen()) {
                /*
                 * The payment is open.
                 */
                $orderDAL->updateOrderStatus($orderId, 'open');
        
            } elseif ($payment->isPending()) {
                /*
                 * The payment is pending.
                 */
                $orderDAL->updateOrderStatus($orderId, 'pending');
            } elseif ($payment->isFailed()) {
                /*
                 * The payment has failed.
                 */
                $orderDAL->updateOrderStatus($orderId, 'failed');
            } elseif ($payment->isExpired()) {
                /*
                 * The payment is expired.
                 */
                $orderDAL->updateOrderStatus($orderId, 'expired');
            } elseif ($payment->isCanceled()) {
                /*
                 * The payment has been canceled.
                 */
                $orderDAL->updateOrderStatus($orderId, 'cancelled');
            } elseif ($payment->hasRefunds()) {
                /*
                 * The payment has been (partially) refunded.
                 * The status of the payment is still "paid"
                 */
                $orderDAL->updateOrderStatus($orderId, 'refunded');
        
            } elseif ($payment->hasChargebacks()) {
                /*
                 * The payment has been (partially) charged back.
                 * The status of the payment is still "paid"
                 */
                $orderDAL->updateOrderStatus($orderId, 'charged back');
            }
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }


}

