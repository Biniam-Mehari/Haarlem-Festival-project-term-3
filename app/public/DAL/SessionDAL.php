<?php
require_once('../../db.php');
require_once('../model/Food.php');
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
        $stmt = $this->connection->prepare("SELECT R.restaurantID, R.restaurantName, R.cuisineType, R.restaurantDescription, R.streetName, R.houseNumber, R.postalCode, R.city, R.seats, R   FROM Restaurant R INNER JOIN Session S ON R.restaurantID = F.restaurantID WHERE R.restaurantID = ? ORDER BY F.startDate ASC");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            

            $restaurant = new Restaurant($restaurantID, $restaurantName, $cuisineType, $restaurantDescription, $streetName, $houseNumber, $postalCode, $city, $seats, $rating, $price, $imageName);
            $session = new Session($sessionID, $startDate, $startTime, $sessionDescription, $reservationFee, $duration, $restaurant);
        }
        return $session;
    }
}
