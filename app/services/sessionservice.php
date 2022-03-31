<?php

namespace Services;
use Repositories\SessionRepository;

// service treats repository as the DAL layer and calls the methods from there

class SessionService {

    private $sessionRepository;

    function __construct() {
        $this->sessionRepository = new SessionRepository();
    }
    

    public function GetSessionDateByRestaurantID($id) {
        return $this->sessionRepository->GetSessionDateByRestaurantID($id);
    }

    public function GetSessionTimeByRestaurantID($id) {
        return $this->sessionRepository->GetSessionTimeByRestaurantID($id);
    }
}
