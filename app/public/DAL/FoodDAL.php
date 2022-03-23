<?php
require_once('../../db.php');
require_once('../model/food.php');
require_once('../model/event.php');


class FoodDAL
{
    private $db;
    private $connection;

    public function __construct()
    {
        $this->db = DB::getInstance();
        $this->connection = $this->db->getConnection();
    }

    public function GetAllRestaurants()
    {
        $stmt = $this->connection->prepare("SELECT foodEventID, restaurantName, cuisineType, description, rating, address, startTime, price, seats, reservationFee, duration, sessions, vat, imageName FROM Food ORDER BY foodEventID ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            $foodEventID = $row["foodEventID"];
            $restaurantName = $row["restaurantName"];
            $cuisineType = $row["cuisineType"];
            $description = $row["description"];
            $rating = $row["rating"];
            $address = $row["address"];
            $startTime = $row["startTime"];
            $price = $row["price"];
            $seats = $row["seats"];
            $reservationFee = $row["reservationFee"];
            $duration = $row["duration"];
            $sessions = $row["sessions"];
            $VAT = $row["vat"];
            $imageName = $row["imageName"];

            //$event = new Event($eventID, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $food = new Food($foodEventID, $restaurantName, $cuisineType, $description, $rating, $address, $startTime, $price, $seats, $reservationFee, $duration, $sessions, $VAT, $imageName);
            $foodEvents[] = $food;
        }
        return $foodEvents;
    }

    public function GetRestaurantById($id)
    {
        $stmt = $this->connection->prepare("SELECT foodEventID, restaurantName, cuisineType, description, rating, address, startTime, price, seats, reservationFee, duration, sessions, vat, imageName FROM Food WHERE foodEventID = ? ORDER BY foodEventID ASC");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            $foodEventID = $row["foodEventID"];
            $restaurantName = $row["restaurantName"];
            $cuisineType = $row["cuisineType"];
            $description = $row["description"];
            $rating = $row["rating"];
            $address = $row["address"];
            $startTime = $row["startTime"];
            $price = $row["price"];
            $seats = $row["seats"];
            $reservationFee = $row["reservationFee"];
            $duration = $row["duration"];
            $sessions = $row["sessions"];
            $VAT = $row["vat"];
            $imageName = $row["imageName"];

            //$event = new Event($id, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $food = new Food($foodEventID, $restaurantName, $cuisineType, $description, $rating, $address, $startTime, $price, $seats, $reservationFee, $duration, $sessions, $VAT, $imageName);
        }
        return $food;
    }



    public function GetReceipt($restaurantName, $startTime, $endTime)
    {
        $stmt = $this->connection->prepare("SELECT E.startTime, E.endTime , E.price, F.eventID, F.restaurantName, F.rating, F.description, E.imageName, F.cuisineType FROM Event E INNER JOIN Food F ON E.id = F.eventID WHERE E.eventType = 'food' AND F.restaurantName = :restaurantName AND E.startTime = :startTime AND E.endTime = :endTime ORDER BY E.startTime");
        $stmt->bind_param("sss", $restaurantName, $startTime, $endTime);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $foodEventID = $row["foodEventID"];
            $restaurantName = $row["restaurantName"];
            $cuisineType = $row["cuisineType"];
            $description = $row["description"];
            $rating = $row["rating"];
            $address = $row["address"];
            $startTime = $row["startTime"];
            $price = $row["price"];
            $seats = $row["seats"];
            $reservationFee = $row["reservationFee"];
            $duration = $row["duration"];
            $sessions = $row["sessions"];
            $VAT = $row["vat"];
            $imageName = $row["imageName"];

            //$event = new Event($eventID, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $food = new Food($foodEventID, $restaurantName, $cuisineType, $description, $rating, $address, $startTime, $price, $seats, $reservationFee, $duration, $sessions, $VAT, $imageName);
        }
        return $food;
    }
}
