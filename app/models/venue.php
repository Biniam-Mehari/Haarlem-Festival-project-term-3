<?php

namespace Models;
Class Venue
{
    private $venueId;
    private $venueName;
    private $Adress;
    private $Housenumber;
    private $Postcode;
    private $City;
    private $Description;
    private $Image_id;

    public function __construct()

    {

        $get_arguments = func_get_args();

        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {

            call_user_func_array(array($this, $method_name), $get_arguments);

        }

    }

    function __construct1($VenueName)
    {
        $this->VenueName = $VenueName;
    }
    function __construct2($VenueId,$VenueName)
    {
        $this->VenueId = $VenueId;
        $this->VenueName = $VenueName;
    }

    function __construct7($venueName, $adress, $houseNumber, $postCode, $city,$description, $imageId)
    { 
        $this->VenueName = $venueName;
        $this->Adress = $adress;
        $this->Housenumber = $houseNumber;
        $this->Postcode = $postCode;
        $this->City = $city;
        $this->Description = $description;
        $this->Image_id = $imageId;
    }

   

   

    /**
     * Get the value of Adress
     */ 
    public function getAdress()
    {
        return $this->Adress;
    }

    /**
     * Set the value of Adress
     *
     * @return  self
     */ 
    public function setAdress($Adress)
    {
        $this->Adress = $Adress;

        return $this;
    }

    /**
     * Get the value of Housenumber
     */ 
    public function getHousenumber()
    {
        return $this->Housenumber;
    }

    /**
     * Set the value of Housenumber
     *
     * @return  self
     */ 
    public function setHousenumber($Housenumber)
    {
        $this->Housenumber = $Housenumber;

        return $this;
    }

    /**
     * Get the value of Postcode
     */ 
    public function getPostcode()
    {
        return $this->Postcode;
    }

    /**
     * Set the value of Postcode
     *
     * @return  self
     */ 
    public function setPostcode($Postcode)
    {
        $this->Postcode = $Postcode;

        return $this;
    }

    /**
     * Get the value of City
     */ 
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Set the value of City
     *
     * @return  self
     */ 
    public function setCity($City)
    {
        $this->City = $City;

        return $this;
    }

    /**
     * Get the value of Description
     */ 
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * Get the value of Image_id
     */ 
    public function getImage_id()
    {
        return $this->Image_id;
    }

    /**
     * Set the value of Image_id
     *
     * @return  self
     */ 
    public function setImage_id($Image_id)
    {
        $this->Image_id = $Image_id;

        return $this;
    }

   
    

    /**
     * Get the value of venueId
     */ 
    public function getVenueId()
    {
        return $this->venueId;
    }

    /**
     * Set the value of venueId
     *
     * @return  self
     */ 
    public function setVenueId($venueId)
    {
        $this->venueId = $venueId;

        return $this;
    }

    /**
     * Get the value of venueName
     */ 
    public function getVenueName()
    {
        return $this->venueName;
    }

    /**
     * Set the value of venueName
     *
     * @return  self
     */ 
    public function setVenueName($venueName)
    {
        $this->venueName = $venueName;

        return $this;
    }
}