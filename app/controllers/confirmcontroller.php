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
        require __DIR__ . '../../views/confirmationMessage.php';
       
       
    }
}