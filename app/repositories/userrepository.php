<?php

namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\User;


class UserRepository extends Repository
{


    public function login()
    {
        try {
            if (isset($_POST['email']) && isset($_POST['password'])) {

                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $email = $_POST['email'];
                $password = $_POST['password'];

                $login = $this->connection->prepare("SELECT * FROM User WHERE email = :email AND password = :password");
                $login->execute(["email" => $email, "password" => $password]);
                $login->setFetchMode(PDO::FETCH_CLASS, 'Models\\User');

                
                if ($login->rowCount() > 0) {
                    $user = $login->fetchObject();
                    $_SESSION["user"] = $user;
                    //echo "<script>location.assign('/food')</script>";
                    header("Location: /food");
                } else {
                    echo '<script>alert("Email or password is incorrect!")</script>';
                    header("Location: /user/loginview");
                }
            }
            else {
                echo '<script>alert("You have been caught!")</script>';
            }

        } catch (PDOException $e) {
            echo "Could not retrieve information from the database for the User table" . $e->getMessage();
        }
    }


    public function register()
    {
        try {
            if (isset($_POST['username']) || isset($_POST['email'])) {

                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                $username = $_POST['username'];
                $email = $_POST['email'];


                $checkUsername = $this->connection->prepare("SELECT * FROM User WHERE username = :username");
                $checkUsername->execute(["username" => $username]);

                $checkEmail = $this->connection->prepare("SELECT * FROM User WHERE username = :username");
                $checkEmail->execute(["email" => $email]);


                if ($checkUsername->rowCount() > 0) {
                    echo '<script>alert("This username already exists! Please enter a proper username.")</script>';
                    return;
                }

                if ($checkEmail->rowCount() > 0) {
                    echo '<script>alert("This email already exists! Please enter a proper email.")</script>';
                    return;
                }

                $userDetails = array(
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'telephoneNumber' => $_POST['telephoneNumber'],
                    'role' => 1
                );

                $this->createUser($userDetails);
                echo "<script>location.assign('/user/loginview')</script>";
            }
            else {
                echo '<script>alert("You have been caught!")</script>';
            }
        } catch (PDOException $e) {
            echo "Could not retrieve information from the database for the User table" . $e->getMessage();
        }
    }

    public function createUser($userDetails)
    {
        try {
            $createUser = $this->connection->prepare("INSERT INTO `User` (firstName, lastName, username, email, `password`, telephoneNumber, `roleID`) VALUES (:firstName, :lastName, :username, :email, :password, :telephoneNumber, :roleID)");
            $createUser->execute(["firstName" => $userDetails['firstName'], "lastName" => $userDetails['lastName'],
             "username" => $userDetails['username'], "email" => $userDetails['email'], "password" => $userDetails['password'],
              "telephoneNumber" => $userDetails['telephoneNumber'], "roleID" => $userDetails['role']]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    // methods for javascript

    public function checkLogin($email, $password) {
        try {
            $login =  $this->connection->prepare("SELECT * FROM `User` WHERE password = :password AND email = :email");
            $login->execute(["password" => $password, "email" => $email]);

            if ($login->rowCount() <= 0) {
                return false;
            }
            
            return true;

        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    public function checkValidEmail($email) {
        try {
            $checkEmail =  $this->connection->prepare("SELECT * FROM `User` WHERE email = :email");
            $checkEmail->execute(["email" => $email]);

            if ($checkEmail->rowCount() > 0) {
                return false;
            }

            return true;

        } catch(PDOException $e) {
            $e->getMEssage();
        }
    }

    public function checkValidUsername($username) {
        try {
            $checkUsername =  $this->connection->prepare("SELECT * FROM `User` WHERE username = :username");
            $checkUsername->execute(["username" => $username]);

            if ($checkUsername->rowCount() > 0) {
                return false;
            }

            return true;

        } catch(PDOException $e) {
            $e->getMEssage();
        }
    }


    // find a use for these

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }
}
