<?php

include_once('../model/event.php');
class Food
{
    private $foodEventID;
    private $restaurantName;
    private $cuisineType;
    private $description;
    private $rating;
    private $address;
    private $startTime;
    private $price;
    private $seats;
    private $reservationFee;
    private $duration;
    private $sessions;
    private $VAT;
    private $imageName;

    //private Event $event;



    /**
     * Get the value of foodEventID
     */
    public function getFoodEventID()
    {
        return $this->foodEventID;
    }

    /**
     * Set the value of foodEventID
     *
     * @return  self
     */
    public function setFoodEventID($foodEventID)
    {
        $this->foodEventID = $foodEventID;

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

    //  /**
    //  * @return Event
    //  */ 
    // public function getEvent()
    // {
    //     return $this->event;
    // }

    // /**
    //  * Set the value of event
    //  *
    //  * @param Event
    //  */ 
    // public function setEvent($event)
    // {
    //     $this->event = $event;

    //     return $this;
    // }






    /**
     * Get the value of startTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set the value of startTime
     *
     * @return  self
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

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

    /**
     * Get the value of duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of sessions
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Set the value of sessions
     *
     * @return  self
     */
    public function setSessions($sessions)
    {
        $this->sessions = $sessions;

        return $this;
    }

    /**
     * Get the value of VAT
     */
    public function getVAT()
    {
        return $this->VAT;
    }

    /**
     * Set the value of VAT
     *
     * @return  self
     */
    public function setVAT($VAT)
    {
        $this->VAT = $VAT;

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


    function __construct($foodEventID, $restaurantName, $cuisineType, $description, $rating, $address, $startTime, $price, $seats, $reservationFee, $duration, $sessions, $VAT, $imageName)
    {
        $this->foodEventID = $foodEventID;
        $this->restaurantName = $restaurantName;
        $this->cuisineType = $cuisineType;
        $this->description = $description;
        $this->rating = $rating;
        $this->address = $address;
        $this->startTime = $startTime;
        $this->price = $price;
        $this->seats = $seats;
        $this->reservationFee = $reservationFee;
        $this->duration = $duration;
        $this->sessions = $sessions;
        $this->VAT = $VAT;
        $this->imageName = $imageName;
    }


}
