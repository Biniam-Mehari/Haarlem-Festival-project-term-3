<?php
require_once('../../db.php');
require_once('../model/Session.php');
require_once('../model/Restaurant.php');


class SessionDAL
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = DB::getInstance();
        $this->connection = $this->db->getConnection();
    }


    public function GetSessionByRestaurantID($id)
    {
        $stmt = $this->connection->prepare("SELECT R.restaurantID, R.restaurantName, R.cuisineType, R.restaurantDescription, R.streetName, R.houseNumber, R.postalCode, R.city, R.rating, R.seats, R.price, R.imageName, S.sessionID, S.restaurantID, S.startDate, S.startTime, S.sessionDescription, S.reservationFee, S.duration, S.capacity FROM Restaurant R INNER JOIN Session S ON R.restaurantID = S.restaurantID WHERE R.restaurantID = ? ORDER BY S.startDate ASC");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            $restaurantID = $row["restaurantID"];
            $restaurantName = $row["restaurantName"];
            $cuisineType = $row["cuisineType"];
            $restaurantDescription = $row["restaurantDescription"];
            $streetName = $row["streetName"];
            $houseNumber = $row["houseNumber"];
            $postalCode = $row["postalCode"];
            $city = $row["city"];
            $seats = $row["seats"];
            $rating = $row["rating"];
            $price = $row["price"];
            $imageName = $row["imageName"];
            $sessionID = $row["sessionID"];
            $startDate = $row["startDate"];
            $startTime = $row["startTime"];
            $sessionDescription = $row["sessionDescription"];
            $reservationFee = $row["reservationFee"];
            $duration = $row["duration"];
            $capacity = $row["capacity"];


            $restaurant = new Restaurant($restaurantID, $restaurantName, $cuisineType, $restaurantDescription, $streetName, $houseNumber, $postalCode, $city, $seats, $rating, $price, $imageName);
            $session = new Session($sessionID, $startDate, $startTime, $sessionDescription, $reservationFee, $duration, $capacity, $restaurant);
        }
        return $session;
    }

    public function GetSessionDateByRestaurantID($id)
    {
        $stmt = $this->connection->prepare("SELECT DISTINCT startDate, restaurantID FROM Session WHERE restaurantID = ? ORDER BY startDate ASC");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            $restaurantID = $row["restaurantID"];
            $startDate = $row["startDate"];
  
            $restaurant = new Restaurant($restaurantID);
            $session = new Session($restaurant, $startDate);
        }
        return $session;
    }
}
