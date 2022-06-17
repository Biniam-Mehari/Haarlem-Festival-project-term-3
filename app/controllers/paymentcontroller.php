<?php

namespace Controllers;

use Services\FoodService;
use \Mollie\Api\MollieApiClient;
require_once("../vendor/autoload.php");

class PaymentController
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

    public function InitializeMollie(){

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
    
        $totalPrice = number_format(floatval($_SESSION["totalAmount"]),2,'.',',');
        $orderID = $_SESSION['orderID'];
        //$orderID = $order->getOrderID();
    
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "$totalPrice"
            ],
            "description" => "Haarlem festival : Order Nr. {$orderID}",
            "redirectUrl" => "https://f653-217-122-95-71.eu.ngrok.io/confirm",
            "webhookUrl"  => "https://f653-217-122-95-71.eu.ngrok.io/webhook",
            "metadata" =>["orderID" => $orderID
            ],
        ]);
        header("Location: " . $payment->getCheckoutUrl(), true, 303);

    }
}
