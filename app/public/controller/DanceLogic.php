<?php
require_once dirname(__FILE__) . '../../DAL/DanceDAL.php';

class DanceLogic
{
    private $danceDAL;

    function __construct()
    {
        $this->danceDAL = new DanceDAL();
    }

//Gets functions from DAL layer
    function GetAllDanceEvents($TimeStartDay, $TimeEndDay)
    {
        try{
            return $this->danceDAL->GetDanceEventsByDay($TimeStartDay, $TimeEndDay);
        }
        catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function GetAllDanceTickets()
    {
        try{
            return $this->danceDAL->GetAllDanceTickets();
        }
        catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}