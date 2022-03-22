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
        $stmt = $this->connection->prepare("SELECT E.startTime, E.endTime , E.price, F.eventID, E.seats, E.imageName, E.vat, F.restaurantName, F.rating, F.description, F.cuisineType, F.address, F.reservationFee FROM Event E INNER JOIN Food F ON E.eventID = F.eventID WHERE E.eventType = 'food' ORDER BY E.startTime ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            $startTime = $row["startTime"];
            $endTime = $row["endTime"];
            $price = $row["price"];
            $eventID = $row["eventID"];
            $restaurantName = $row["restaurantName"];
            $rating = $row["rating"];
            $description = $row["description"];
            $imageName = $row["imageName"];
            $cuisineType = $row["cuisineType"];
            $seats = $row["seats"];
            $VAT = $row["vat"];
            $address = $row["address"];
            $reservationFee = $row["reservationFee"];

            $event = new Event($eventID, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $food = new Food($eventID, $restaurantName, $cuisineType, $description, $rating, $address, $reservationFee, $event);
            $foodEvents[] = $food;
        }
        return $foodEvents;
    }

    public function GetRestaurantById($id)
    {
        $stmt = $this->connection->prepare("SELECT E.startTime, E.endTime , E.price, F.eventID, E.seats, E.imageName, E.vat, F.restaurantName, F.rating, F.description, F.cuisineType, F.address, F.reservationFee FROM Event E INNER JOIN Food F ON E.eventID = F.eventID WHERE E.eventType = 'food' ");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            $startTime = $row["startTime"];
            $endTime = $row["endTime"];
            $price = $row["price"];
            $id = $row["eventID"];
            $restaurantName = $row["restaurantName"];
            $rating = $row["rating"];
            $description = $row["description"];
            $imageName = $row["imageName"];
            $cuisineType = $row["cuisineType"];
            $seats = $row["seats"];
            $VAT = $row["vat"];
            $address = $row["address"];
            $reservationFee = $row["reservationFee"];

            $event = new Event($id, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $food = new Food($id, $restaurantName, $cuisineType, $description, $rating, $address, $reservationFee, $event);
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
            $startTime = $row["startTime"];
            $endTime = $row["endTime"];
            $price = $row["price"];
            $eventID = $row["eventID"];
            $restaurantName = $row["restaurantName"];
            $rating = $row["rating"];
            $description = $row["description"];
            $imageName = $row["imageName"];
            $cuisineType = $row["cuisineType"];
            $seats = $row["seats"];
            $VAT = $row["vat"];
            $address = $row["address"];
            $reservationFee = $row["reservationFee"];

            $event = new Event($eventID, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $food = new Food($eventID, $restaurantName, $cuisineType, $description, $rating, $address, $reservationFee, $event);
        }
        return $food;
    }
}
