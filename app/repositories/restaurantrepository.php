<?php

namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Restaurant;

class RestaurantRepository extends Repository {
    
    public function GetAllRestaurantInformation() {
        try {
            $stmt = $this->connection->prepare("SELECT restaurantID, restaurantName, cuisineType, restaurantDescription, streetName, houseNumber, postalCode, city, seats, rating, price, imageName FROM Restaurant ORDER BY restaurantID ASC");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Models\\Restuarant');

            return $stmt->fetchAll();
        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Restaurant" . $e->getMessage();
        }
    }
}