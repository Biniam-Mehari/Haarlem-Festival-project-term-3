<?php

class Session {
    private $sessionID;
    private $startDate;
    private $startTime;
    private $sessionDescription;
    private $reservationFee;
    private $duration;
    private $seats;
    private $restaurant;



    public function __construct($sessionID, $startDate, $startTime, $sessionDescription, $reservationFee, $duration, $seats, $restaurant)
    {
        $this->sessionID = $sessionID;
        $this->startDate = $startDate;
        $this->startTime = $startTime;
        $this->sessionDescription = $sessionDescription;
        $this->reservationFee = $reservationFee;
        $this->duration = $duration;
        $this->seats = $seats;
        $this->restaurant = $restaurant;
    }

    /**
     * Get the value of sessionID
     */ 
    public function getSessionID()
    {
        return $this->sessionID;
    }

    /**
     * Set the value of sessionID
     *
     * @return  self
     */ 
    public function setSessionID($sessionID)
    {
        $this->sessionID = $sessionID;

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
     * Get the value of sessionDescription
     */ 
    public function getSessionDescription()
    {
        return $this->sessionDescription;
    }

    /**
     * Set the value of sessionDescription
     *
     * @return  self
     */ 
    public function setSessionDescription($sessionDescription)
    {
        $this->sessionDescription = $sessionDescription;

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
}