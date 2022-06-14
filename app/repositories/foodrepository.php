<?php

namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Restaurant;
use Models\Session;

class FoodRepository extends Repository {
    
    public function GetAllRestaurantInformation() {
        try {
            $stmt = $this->connection->prepare("SELECT restaurantID, restaurantName, cuisineType, restaurantDescription, streetName, houseNumber, postalCode, city, seats, rating, price, imageName, reservationFee FROM Restaurant ORDER BY restaurantID ASC");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');

            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Restaurant" . $e->getMessage();
        }
    }

    public function GetRestaurantInformationByID($id) {
        try {
            $stmt = $this->connection->prepare("SELECT restaurantID, restaurantName, cuisineType, restaurantDescription, streetName, houseNumber, postalCode, city, seats, rating, price, imageName, reservationFee FROM Restaurant WHERE restaurantID = :restaurantID");
            $stmt->bindParam(":restaurantID", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restaurant');
    
            return $stmt->fetchObject();
        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Restaurant" . $e->getMessage();
        }

    }

    public function GetSessionsByRestaurantID($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT R.restaurantID, R.restaurantName, R.cuisineType, R.restaurantDescription, R.streetName, R.houseNumber, R.postalCode, R.city, R.rating, R.seats, R.price, R.imageName, S.restaurantID, S.startDate, S.startTime, S.sessionDescription, R.reservationFee, S.duration, S.ticketsSold FROM Restaurant R INNER JOIN Session S ON R.restaurantID = S.restaurantID WHERE R.restaurantID = :restaurantID ORDER BY S.startDate ASC");
            $stmt->bindParam(":restaurantID", $id);
            $stmt->execute();
            $sessions = array();
            while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
                $restaurant = new Restaurant();
                $session = new Session();
                $restaurant->restaurantID = $row['restaurantID'];
                $restaurant->restaurantName = $row['restaurantName'];
                $restaurant->cuisineType = $row['cuisineType'];
                $restaurant->restaurantDescription = $row['restaurantDescription'];
                $restaurant->streetName = $row['streetName'];
                $restaurant->houseNumber = $row['houseNumber'];
                $restaurant->postalCode = $row['postalCode'];
                $restaurant->city = $row['city'];
                $restaurant->rating = $row['rating'];
                $restaurant->seats = $row['seats'];
                $restaurant->price = $row['price'];
                $restaurant->imageName = $row['imageName'];
                $restaurant->reservationFee = $row['reservationFee'];
                $session->startDate = $row['startDate'];
                $session->startTime = $row['startTime'];
                $session->sessionDescription = $row['sessionDescription'];
                $session->duration = $row['duration'];
                $session->ticketsSold = $row['ticketsSold'];

                $session->restaurant = $restaurant;
                $sessions[] = $session;
            }
            return $sessions; 

        } catch (PDOException $e) {
            echo "Could not retrieve information from the database for the Session" . $e->getMessage();
        }
    }

    public function GetSessionsDateByRestaurantID($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT startDate FROM `Session` WHERE restaurantID = :restaurantID ORDER BY startDate ASC");
            $stmt->bindParam(":restaurantID", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Session');

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Could not retrieve information from the database for the Session" . $e->getMessage();
        }
    }


    public function GetSessionsTimeByRestaurantID($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT startTime, restaurantID, duration FROM `Session` WHERE restaurantID = :restaurantID ORDER BY startTime ASC");
            $stmt->bindParam(":restaurantID", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Session');

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Could not retrieve information from the database for the Session" . $e->getMessage();
        }
    }

    public function GetSessionTimesByDateAndRestaurantID($startDate, $id) {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT startTime FROM `Session` WHERE startDate = :startDate AND restaurantID = :restaurantID ORDER BY startTime ASC");
            $stmt->bindParam(":startDate", $startDate);
            $stmt->bindParam(":restaurantID", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Session');

            return $stmt->fetchAll();
        }  catch(PDOException $e) {
            $e->getMessage();
        }
    } 

    public function GetSessionID($restaurantID, $startDate, $startTime) {
        try {
            $stmt = $this->connection->prepare("SELECT sessionID FROM `Session` WHERE restaurantID = :restaurantID AND startDate = :startDate AND startTime = :startTime");
            $stmt->execute(["restaurantID" => $restaurantID, "startDate" => $startDate, "startTime" => $startTime]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Session');

            return $stmt->fetchObject();
        }  catch(PDOException $e) {
            $e->getMessage();
        }
    }

 

    // public function GetSessionInformationByRestaurantID($id)
    // {
    //     try {
    //         $stmt = $this->connection->prepare("SELECT DISTINCT sessionDescription, reservationFee FROM `Session` WHERE restaurantID = :restaurantID");
    //         $stmt->bindParam(":restaurantID", $id);
    //         $stmt->execute();
    //         $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Session');

    //         return $stmt->fetchAll();
    //     } catch (PDOException $e) {
    //         echo "Could not retrieve information from the database for the Session" . $e->getMessage();
    //     }
    // }
}