<?php

namespace Services;
use Repositories\DanceRepository;

// service treats repository as the DAL layer and calls the methods from there

class DanceService {

    private $danceRepository;

    function __construct() {
        $this->danceRepository = new DanceRepository;
    }

    public function GetAllDanceEventsInformation() {
        return $this->danceRepository->GetAllDanceEventsInformation();
    }

    public function GetDanceInformationByID($id) {
        return $this->danceRepository->GetDanceInformationByID($id);
    }



}