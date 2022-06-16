<?php

namespace Controllers;

use Services\DanceService;

class DanceController
{

    private $danceService;

    function __construct()
    {
        $this->danceService = new DanceService();
    }


    public function index()
    {
        $events = $this->danceService->GetAllDanceEventsInformation();
        require __DIR__ . '../../views/Dance/dancemain.php';
    }

    public function GetDanceInformationByID()
    {
        $danceID = $_GET['id'];
        $event = $this->danceService->GetDanceInformationByID($danceID);
        require __DIR__ . '../../views/Dance/dancereservation.php';
        //var_dump($event);
  
    }

}
