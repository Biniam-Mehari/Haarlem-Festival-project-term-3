<?php

include_once('./Event.php');
class Food {
    private $eventID;
    private $restaurantName;
    private $cuisineType;
    private $description;
    private $rating;
    private $address;
    private $reservationFee;
    private Event $event;

    /**
     * Get the value of eventID
     */ 
    public function getEventID()
    {
        return $this->eventID;
    }

    /**
     * Set the value of eventID
     *
     * @return  self
     */ 
    public function setEventID($eventID)
    {
        $this->eventID = $eventID;

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
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of reservationFee
     */ 
    public function getReservationFee()
    {
        return $this->reservationFee;
    }

    /**
     * Set the value of reservationFee
     *
     * @return  self
     */ 
    public function setReservationFee($reservationFee)
    {
        $this->reservationFee = $reservationFee;

        return $this;
    }

     /**
     * @return Event
     */ 
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set the value of event
     *
     * @param Event
     */ 
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }



    function __construct($eventID, $restaurantName, $cuisineType, $description, $rating, $address, $reservationFee, $event)
    {
        $this->eventID = $eventID;
        $this->restaurantName = $restaurantName;
        $this->cuisineType = $cuisineType;
        $this->description = $description;
        $this->rating = $rating;
        $this->address = $address;
        $this->reservationFee = $reservationFee;
        $this->event = $event;
    }

}