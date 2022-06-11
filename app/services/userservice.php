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

}
