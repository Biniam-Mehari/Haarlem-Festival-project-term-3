<?php

namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Restaurant;
use Session;

class SessionRepository extends Repository
{

    public function GetSessionByRestaurantID($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT R.restaurantID, R.restaurantName, R.cuisineType, R.restaurantDescription, R.streetName, R.houseNumber, R.postalCode, R.city, R.rating, R.seats, R.price, R.imageName, S.sessionID, S.restaurantID, S.startDate, S.startTime, S.sessionDescription, S.reservationFee, S.duration, S.ticketsSold FROM Restaurant R INNER JOIN Session S ON R.restaurantID = S.restaurantID WHERE R.restaurantID = ? ORDER BY S.startDate ASC");
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
                $session->sessionID = $row['sessionID'];
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

    public function GetSessionDateByRestaurantID($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT startDate, restaurantID FROM Session WHERE restaurantID = ? ORDER BY startDate ASC");
            $stmt->bindParam(":restaurantID", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Session');

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Could not retrieve information from the database for the Session" . $e->getMessage();
        }
    }


    public function GetSessionTimeByRestaurantID($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT startTime, restaurantID FROM Session WHERE restaurantID = ? ORDER BY startDate ASC");
            $stmt->bindParam(":restaurantID", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Session');

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Could not retrieve information from the database for the Session" . $e->getMessage();
        }
    }
}
