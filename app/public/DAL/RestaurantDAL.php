<?php
require_once('../../db.php');
require_once('../model/Restaurant.php');


class RestaurantDAL
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

            $restaurant = new Restaurant($restaurantID, $restaurantName, $cuisineType, $restaurantDescription, $streetName, $houseNumber, $postalCode, $city, $seats, $rating, $price, $imageName);
            $restaurantsInformation[] = $restaurant;
        }
        return $restaurantsInformation;
    }
}
