<?php
class Restaurant
{

    private $restaurantID;
    private $restaurantName;
    private $cuisineType;
    private $description;
    private $streetName;
    private $houseNumber;
    private $postalCode;
    private $city;
    private $seats;
    private $rating;
    private $price;
    private $imageName;

    function __construct($restaurantID, $restaurantName, $cuisineType, $description, $streetName, $houseNumber, $postalCode, $city, $seats, $rating, $price, $imageName)
    {
        $this->restaurantID = $restaurantID;
        $this->restaurantName = $restaurantName;
        $this->cuisineType = $cuisineType;
        $this->description = $description;
        $this->streetName = $streetName;
        $this->houseNumber = $houseNumber;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->seats = $seats;
        $this->rating = $rating;
        $this->price = $price;
        $this->imageName = $imageName;
    }

    /**
     * Get the value of restaurantID
     */ 
    public function getRestaurantID()
    {
        return $this->restaurantID;
    }

    /**
     * Set the value of restaurantID
     *
     * @return  self
     */ 
    public function setRestaurantID($restaurantID)
    {
        $this->restaurantID = $restaurantID;

        return $this;
    }

    /**
     * Get the value of restaurantName
     */ 
    public function getRestaurantName()
    {
        return $this->restaurantName;
    }

    /**
     * Set the value of restaurantName
     *
     * @return  self
     */ 
    public function setRestaurantName($restaurantName)
    {
        $this->restaurantName = $restaurantName;

        return $this;
    }

    /**
     * Get the value of cuisineType
     */ 
    public function getCuisineType()
    {
        return $this->cuisineType;
    }

    /**
     * Set the value of cuisineType
     *
     * @return  self
     */ 
    public function setCuisineType($cuisineType)
    {
        $this->cuisineType = $cuisineType;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of streetName
     */ 
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set the value of streetName
     *
     * @return  self
     */ 
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * Get the value of houseNumber
     */ 
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set the value of houseNumber
     *
     * @return  self
     */ 
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * Get the value of postalCode
     */ 
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */ 
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of imageName
     */ 
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     *
     * @return  self
     */ 
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get the value of seats
     */ 
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set the value of seats
     *
     * @return  self
     */ 
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }
}