<?php

include_once('../model/Restaurant.php');
class Food
{
    private $foodEventID;
    private $startDate;
    private $startTime;
    private $description;
    private $reservationFee;
    private $duration;
    private $sessions;
    private $VAT;
    private Restaurant $restaurant;


    function __construct($foodEventID, $startDate, $startTime, $description, $reservationFee, $duration, $sessions, $VAT, $restaurant)
    {
        $this->foodEventID = $foodEventID;
        $this->startDate = $startDate;
        $this->startTime = $startTime;
        $this->description = $description;
        $this->reservationFee = $reservationFee;
        $this->duration = $duration;
        $this->sessions = $sessions;
        $this->VAT = $VAT;
        $this->restaurant = $restaurant;
    }



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
     * Get the value of startDate
     */ 
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @return  self
     */ 
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

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
     * Get the value of restaurant
     */ 
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * Set the value of restaurant
     *
     * @return  self
     */ 
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;

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
}
