<?php

namespace Models;
Class Dance
{
    private $eventId;
    private $Duration;
    private $Capacity;
    public $Venue;
    public $Artist;
    private $Price;
    private $SpecialGuest;
    private $Session;
    private $Vat;
    private $Date;
    private $StartTime;
    private $Imageid;

    public function __construct()

    {

        $get_arguments  = func_get_args();

        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {

            call_user_func_array(array($this, $method_name), $get_arguments);

        }

    }

    function __construct14($eventId, $Duration, $VenueName,$Price,$SpecialGuest,$Session,$Artist,$Vat,$Date,$StartTime,$Imageid,$venueid,$artistid,$capacity)
    {
        $this->eventId = $eventId;
        $this->Duration = $Duration;
       // $this->Venue = new Venue($venueid,$VenueName);
      //  $this->Artist = new Artist($artistid,$Artist);
        $this->Price = $Price;
        $this->SpecialGuest = $SpecialGuest;
        $this->Session = $Session;
        $this->Vat = $Vat;
        $this->Date = $Date;
        $this->StartTime = $StartTime;
        $this->Imageid = $Imageid;
        $this->Capacity = $capacity;
    }

    function __construct4($eventId, $VenueName,$ArtistName,$date)
    {
        $this->eventId = $eventId;
       // $this->Venue = new Venue($VenueName);
       // $this->Artist = new Artist($ArtistName);
        $this->Date = $date;
        
    }


   

   

    /**
     * Get the value of Duration
     */ 
    public function getDuration()
    {
        return $this->Duration;
    }

    /**
     * Set the value of Duration
     *
     * @return  self
     */ 
    public function setDuration($Duration)
    {
        $this->Duration = $Duration;

        return $this;
    }

    /**
     * Get the value of Capacity
     */ 
    public function getCapacity()
    {
        return $this->Capacity;
    }

    /**
     * Set the value of Capacity
     *
     * @return  self
     */ 
    public function setCapacity($Capacity)
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    

    /**
     * Get the value of Venue
     */ 
    public function getVenue()
    {
        return $this->Venue;
    }

    /**
     * Set the value of Venue
     *
     * @return  self
     */ 
    public function setVenue($Venue)
    {
        $this->Venue = $Venue;

        return $this;
    }

    /**
     * Get the value of Artist
     */ 
    public function getArtist()
    {
        return $this->Artist;
    }

    /**
     * Set the value of Artist
     *
     * @return  self
     */ 
    public function setArtist($Artist)
    {
        $this->Artist = $Artist;

        return $this;
    }

    /**
     * Get the value of Price
     */ 
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Set the value of Price
     *
     * @return  self
     */ 
    public function setPrice($Price)
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * Get the value of SpecialGuest
     */ 
    public function getSpecialGuest()
    {
        return $this->SpecialGuest;
    }

    /**
     * Set the value of SpecialGuest
     *
     * @return  self
     */ 
    public function setSpecialGuest($SpecialGuest)
    {
        $this->SpecialGuest = $SpecialGuest;

        return $this;
    }

    /**
     * Get the value of Session
     */ 
    public function getSession()
    {
        return $this->Session;
    }

    /**
     * Set the value of Session
     *
     * @return  self
     */ 
    public function setSession($Session)
    {
        $this->Session = $Session;

        return $this;
    }

    /**
     * Get the value of Vat
     */ 
    public function getVat()
    {
        return $this->Vat;
    }

    /**
     * Set the value of Vat
     *
     * @return  self
     */ 
    public function setVat($Vat)
    {
        $this->Vat = $Vat;

        return $this;
    }

    /**
     * Get the value of Date
     */ 
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     *
     * @return  self
     */ 
    public function setDate($Date)
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * Get the value of StartTime
     */ 
    public function getStartTime()
    {
        return $this->StartTime;
    }

    /**
     * Set the value of StartTime
     *
     * @return  self
     */ 
    public function setStartTime($StartTime)
    {
        $this->StartTime = $StartTime;

        return $this;
    }

    /**
     * Get the value of Imageid
     */ 
    public function getImageid()
    {
        return $this->Imageid;
    }

    /**
     * Set the value of Imageid
     *
     * @return  self
     */ 
    public function setImageid($Imageid)
    {
        $this->Imageid = $Imageid;

        return $this;
    }

    /**
     * Get the value of eventId
     */ 
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * Set the value of eventId
     *
     * @return  self
     */ 
    public function setEventId($eventId)
    {
        $this->eventId = $eventId;

        return $this;
    }
}
