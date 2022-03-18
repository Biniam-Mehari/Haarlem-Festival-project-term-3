<?php

class Event
{
    private $id;
    private $eventType;
    private $startTime;
    private $endTime;
    private $seats;
    private $price;
    private $VAT;
    private $imageName;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of eventType
     */ 
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Set the value of eventType
     *
     * @return  self
     */ 
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;

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
     * Get the value of endTime
     */ 
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set the value of endTime
     *
     * @return  self
     */ 
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

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

    public function __construct($id, $eventType, $startTime, $endTime, $seats, $price, $VAT, $imageName)
    {
        $this->id = $id;
        $this->eventType = $eventType;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->seats = $seats;
        $this->price = $price;
        $this->VAT = $VAT;
        $this->imageName = $imageName;
    }
}