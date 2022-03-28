<?php

require_once('../DAL/Session.php');

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
}