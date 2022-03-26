<?php
require_once('../../db.php');
require_once('../model/Food.php');
require_once('../model/Restaurant.php');


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
        $stmt = $this->connection->prepare("SELECT restaurantID, restaurantName, cuisineType, restaurantDescription, streetName, houseNumber, postalCode, city, seats, rating, price, imageName FROM Restaurant ORDER BY restaurantID ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $restaurantID = $row["restaurantID"];
            $seats = $row["seats"];
            $restaurantName = $row["restaurantName"];
            $cuisineType = $row["cuisineType"];
            $restaurantDescription = $row["restaurantDescription"];
            $streetName = $row["streetName"];
            $houseNumber = $row["houseNumber"];
            $postalCode = $row["postalCode"];
            $city = $row["city"];
            $rating = $row["rating"];
            $price = $row["price"];
            $imageName = $row["imageName"];

            //$event = new Event($eventID, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $restaurant = new Restaurant($restaurantID, $restaurantName, $cuisineType, $restaurantDescription, $streetName, $houseNumber, $postalCode, $city, $seats, $rating, $price, $imageName);
            ///$food = new Food($foodEventID, $startDate, $startTime, $foodDescription, $reservationFee, $duration, $sessions, $VAT, $restaurant);
            $restaurantsInformation[] = $restaurant;
        }
        return $restaurantsInformation;
    }

    public function GetRestaurantById($id)
    {
        $stmt = $this->connection->prepare("SELECT F.foodEventID, F.restaurantID, F.startDate, F.startTime, F.foodDescription, F.reservationFee, F.duration, F.sessions, F.vat, R.restaurantID, R.restaurantName, R.cuisineType, R.restaurantDescription, R.streetName, R.houseNumber, R.postalCode, R.city, R.seats, R.rating, R.price, R.imageName FROM Restaurant R INNER JOIN Food F ON R.restaurantID = F.restaurantID WHERE R.restaurantID = ? ORDER BY R.restaurantID ASC");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {

            $foodEventID = $row["foodEventID"];
            $restaurantID = $row["restaurantID"];
            $startDate = $row["startDate"];
            $startTime = $row["startTime"];
            $foodDescription = $row["foodDescription"];
            $seats = $row["seats"];
            $reservationFee = $row["reservationFee"];
            $duration = $row["duration"];
            $sessions = $row["sessions"];
            $VAT = $row["vat"];
            $restaurantName = $row["restaurantName"];
            $cuisineType = $row["cuisineType"];
            $restaurantDescription = $row["restaurantDescription"];
            $streetName = $row["streetName"];
            $houseNumber = $row["houseNumber"];
            $postalCode = $row["postalCode"];
            $city = $row["city"];
            $rating = $row["rating"];
            $price = $row["price"];
            $imageName = $row["imageName"];

            //$event = new Event($id, $startTime, $endTime, $seats, $price, $VAT, $imageName);
            $restaurant = new Restaurant($restaurantID, $restaurantName, $cuisineType, $restaurantDescription, $streetName, $houseNumber, $postalCode, $city, $seats, $rating, $price, $imageName);
            $food = new Food($foodEventID, $startDate, $startTime, $foodDescription, $reservationFee, $duration, $sessions, $VAT, $restaurant);
        }
        return $food;
    }



    // public function GetReceipt($restaurantName, $startTime, $endTime)
    // {
    //     $stmt = $this->connection->prepare("SELECT E.startTime, E.endTime , E.price, F.eventID, F.restaurantName, F.rating, F.description, E.imageName, F.cuisineType FROM Event E INNER JOIN Food F ON E.id = F.eventID WHERE E.eventType = 'food' AND F.restaurantName = :restaurantName AND E.startTime = :startTime AND E.endTime = :endTime ORDER BY E.startTime");
    //     $stmt->bind_param("sss", $restaurantName, $startTime, $endTime);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     while ($row = $result->fetch_assoc()) {
    //         $foodEventID = $row["foodEventID"];
    //         $restaurantName = $row["restaurantName"];
    //         $cuisineType = $row["cuisineType"];
    //         $description = $row["description"];
    //         $rating = $row["rating"];
    //         $address = $row["address"];
    //         $startTime = $row["startTime"];
    //         $price = $row["price"];
    //         $seats = $row["seats"];
    //         $reservationFee = $row["reservationFee"];
    //         $duration = $row["duration"];
    //         $sessions = $row["sessions"];
    //         $VAT = $row["vat"];
    //         $imageName = $row["imageName"];

    //         //$event = new Event($eventID, $startTime, $endTime, $seats, $price, $VAT, $imageName);
    //         $food = new Food($foodEventID, $restaurantName, $cuisineType, $description, $rating, $address, $startTime, $price, $seats, $reservationFee, $duration, $sessions, $VAT, $imageName);
    //     }
    //     return $food;
    // }
}
