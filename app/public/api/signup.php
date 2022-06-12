<?php

$fetchData = file_get_contents("php://input");

if (isset($_POST['username']) || isset($_POST['email'])) {

    require_once('../../db.php');
    $connection = DB::getInstance();

    $username = $_POST['username'];
    $email = $_POST['email'];


    $checkEmail = $connection->prepare("SELECT * FROM `User` WHERE email = :email");
    $checkEmail->execute(["email" => $email]);

    $checkUsername = $connection->prepare("SELECT * FROM `User` WHERE username = :username");
    $checkUsername->execute(["username" => $username]);

    if ($checkEmail->rowCount() > 0) {
        print_r(json_encode(["result" => "    
        <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
        The email is already registered! Please use a different email!</div>"]));
        return;
    }

    if ($checkUsername->rowCount() > 0) {
        print_r(json_encode(["result" => "    
        <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
        This username is already taken! Please make enter a username that doesn't exist</div>"]));
        return;
    }

    print_r(json_encode(["result" => true]));
}