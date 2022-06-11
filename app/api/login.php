<?php

$fetchData = file_get_contents("php://input");

if (isset($_POST['email']) && isset($_POST['password'])) {

    require_once('../db.php');
    $connection = DB::getInstance();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login =  $db->prepare("SELECT * FROM `User` WHERE password = :password AND email = :email");
    $login->execute(["password" => $password, "email" => $email]);

    if ($login->rowCount() <= 0) {
        print_r(json_encode(["result" => "    
        <div class='alert mt-3' role='alert' style=\"width: 100%; color: #ffffff;background-color: #ff162b;\">
        Login failed, Your email address or password is not correct </div>"]));
        return;
    }

    print_r(json_encode(["result" => true]));
}