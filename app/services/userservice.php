<?php

namespace Services;
use Repositories\UserRepository;


class UserService {

    private $userRepository;

    function __construct() {
        $this->userRepository = new UserRepository;
    }


    public function login() {
        return $this->userRepository->login();
    }

    public function signup() {
        return $this->userRepository->register();
    }



    // methods for js to handle
    public function checkLogin($username, $password) {
        return $this->userRepository->checkLogin($username, $password);
    }

    public function checkValidEmail($email) {
        return $this->userRepository->checkValidEmail($email);
    }

    public function checkValidUsername($username) {
        return $this->userRepository->checkValidUsername($username);
    }

}
