<?php

namespace Controllers;

use Services\UserService;

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

$fetchData = file_get_contents("php://input"); // check later

class UserController
{

    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }


    public function loginview()
    {

        require __DIR__ . '../../views/login.php';
    }

    public function signupview()
    {
        require __DIR__ . '../../views/signup.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        echo "<script>location.assign('/food')</script>";
    }


    public function login()
    {
        $login = $this->userService->login();
        echo "<script>location.assign('/food')</script>";
    }

    public function signup()
    {
        $signup = $this->userService->signup();
        echo "<script>location.assign('/food')</script>";
    }

    public function checkLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $json = file_get_contents('php://input');

            if (isset($_POST['email']) && isset($_POST['password'])) {


                $email = $_POST['email'];
                $password = $_POST['password'];

                $login =  $this->userService->checkLogin($email, $password);


                if (!$login) {
                    print_r(json_encode(["result" => "    
                    <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
                    Your email or password is incorrect. Please try again! </div>"]));
                    return;
                }

                print_r(json_encode(["result" => true]));
            }
        }
    }

    public function checkValidEmailOrUsername()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $json = file_get_contents('php://input');

            if (isset($_POST['username']) || isset($_POST['email'])) {


                $username = $_POST['username'];
                $email = $_POST['email'];


                $checkEmail = $this->userService->checkValidEmail($email);
                $checkUsername = $this->userService->checkValidUsername($username);

                if (!$checkEmail) {
                    print_r(json_encode(["result" => "    
                    <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
                    The email is already registered! Please use a different email!</div>"]));
                    return;
                }

                if (!$checkUsername) {
                    print_r(json_encode(["result" => "    
                    <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
                    This username is already taken! Please make enter a username that doesn't exist</div>"]));
                    return;
                }

                print_r(json_encode(["result" => true]));
            }
        }
    }
}
