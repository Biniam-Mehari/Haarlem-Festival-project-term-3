<?php

namespace Controllers;

use Services\UserService;

class UserController
{

    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }


    public function loginview() {
        require __DIR__ . '../../views/login.php';
    }

    public function signupview() {
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        require __DIR__ . '../../views/signup.php';
    }


    public function login()
    {
        $login = $this->userService->login();
    }

    public function signup() {
        //$signup = $this->userService->register();
        require __DIR__ . '../../views/signup.php';
    }

}
