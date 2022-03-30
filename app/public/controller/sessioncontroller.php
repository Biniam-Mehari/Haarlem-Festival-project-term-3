<?php

require_once('../DAL/SessionDAL.php');

class SessionController {

    private $sessionService;

    function __construct()
    {
        $this->sessionService = new SessionDAL();
    }

    public function GetSessionByRestaurantID($id) {
        try {
            return $this->sessionService->GetSessionByRestaurantID($id);
        }
        catch(Exception $e) {
            echo 'You have an exception: ',  $e->getMessage(), "\n";
        }
    }

    public function GetSessionDateByRestaurantID($id) {
        try {
            return $this->sessionService->GetSessionDateByRestaurantID($id);
        }
        catch(Exception $e) {
            echo 'You have an exception: ',  $e->getMessage(), "\n";
        }
    }

    public function GetSessionTimeByRestaurantID($id) {
        try {
            return $this->sessionService->GetSessionTimeByRestaurantID($id);
        }
        catch(Exception $e) {
            echo 'You have an exception: ',  $e->getMessage(), "\n";
        }
    }
}