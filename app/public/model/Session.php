<?php

class Session {
    private $sessionID;
    private $startDate;
    private $startTime;
    private $sessionDescription;
    private $reservationFee;
    private $duration;
    private $capacity;
    private $restaurant;


    public function __construct()
    {
        $get_arguments = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct' . $number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    public function __construct8($sessionID, $startDate, $startTime, $sessionDescription, $reservationFee, $duration, $capacity, $restaurant)
    {
        $this->sessionID = $sessionID;
        $this->startDate = $startDate;
        $this->startTime = $startTime;
        $this->sessionDescription = $sessionDescription;
        $this->reservationFee = $reservationFee;
        $this->duration = $duration;
        $this->capacity = $capacity;
        $this->restaurant = $restaurant;
    }

    public function __construct2($restaurant, $startDate) {
        $this->restaurant = $restaurant;
        $this->startDate = $startDate;
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

    /**
     * Get the value of capacity
     */ 
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set the value of capacity
     *
     * @return  self
     */ 
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }
}