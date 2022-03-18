<?php
require_once dirname(__FILE__) . '/../DAL/CombiDAL.php';

class CombiLogic
{
    private $combiDAL;

    function __construct()
    {
        $this->combiDAL = new CombiDAL();
    }

//Gets functions from DAL layer
    function GetAllCombiEventsByName($ticketName1, $ticketName2)
    {
        try{
            return $this->combiDAL->GetCombiEventsByName($ticketName1, $ticketName2);
        }
        catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}