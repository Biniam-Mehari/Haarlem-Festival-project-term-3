<?php

$fetchData = file_get_contents("php://input");

if (isset($_POST['email'])) {

    require_once('../db.php');
    $connection = DB::getInstance();

    $username = $_POST['username'];
    $email = $_POST['email'];


    $checkEmail = $connection->prepare("SELECT * FROM User WHERE email = :email");
    $checkEmail->execute(["email" => $email]);

    $checkUsername = $connection->prepare("SELECT * FROM User WHERE username = :username");
    $checkUsername->execute(["username" => $username]);

    if ($checkEmail->rowCount() > 0) {
        print_r(json_encode(["result" => "    
        <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
        The email is already taken!</div>"]));
        return;
    }

    if ($checkTelephone->rowCount() > 0) {
        print_r(json_encode(["result" => "    
        <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
        The telephone number already exists!</div>"]));
        return;
    }

    print_r(json_encode(["result" => true]));
}