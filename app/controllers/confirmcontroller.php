<?php

namespace Controllers;



class confirmController
{
    private $invoice;
    function __construct()
    {
        $this->invoice =new InvoiceController();
    }
    public function index(){

        //sending invoice
        $this->invoice->index();
        unset($_SESSION['reservations']);
        unset($_SESSION['orderID']);
        unset($_SESSION['totalAmount']);
        require __DIR__ . '../../views/confirmationMessage.php';
       
       
    }
}