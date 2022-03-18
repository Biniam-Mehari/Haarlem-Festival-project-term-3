<?php

class Event
{
    private $Event_ID;
    private $EventName;
    private $ProductName;
    private $StartTime;
    private $EndTime;
    private $Seats;
    private $Price;
    private $Btw;

    public function __construct()
    {
        $get_arguments       = func_get_args();
        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
            call_user_func_array(array($this, $method_name), $get_arguments);
        }
    }

    function __construct8($Event_ID, $EventName, $ProductName, $StartTime, $EndTime, $Seats, $Price, $Btw)
    {
        $this->Event_ID = $Event_ID;
        $this->EventName = $EventName;
        $this->ProductName = $ProductName;
        $this->StartTime = $StartTime;
        $this->EndTime = $EndTime;
        $this->Seats = $Seats;
        $this->Price = $Price;
        $this->Btw = $Btw;

    }

    function __construct6($Event_ID, $EventName, $ProductName, $StartTime, $Price, $Btw){
        $this->Event_ID = $Event_ID;
        $this->EventName = $EventName;
        $this->ProductName = $ProductName;
        $this->StartTime = $StartTime;
        $this->Price = $Price;
        $this->Btw = $Btw;
    }
    
     function __construct5($ProductName, $StartTime, $EndTime, $Seats, $Price){
        $this->ProductName = $ProductName;
        $this->StartTime = $StartTime;
        $this->EndTime = $EndTime;
        $this->Seats = $Seats;
        $this->Price = $Price;
    }
    
    function __construct3($StartTime, $EndTime, $Price){
        $this->StartTime = $StartTime;
        $this->EndTime = $EndTime;
        $this->Price = $Price;
    }

    function __construct1( $Price){
        $this->Price = $Price;
    }

    /**
     * @return mixed
     */
    public function getEventID()
    {
        return $this->Event_ID;
    }

    /**
     * @param mixed $Event_ID
     */
    public function setEventID($Event_ID)
    {
        $this->Event_ID = $Event_ID;
    }

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->EventName;
    }

    /**
     * @param mixed $EventName
     */
    public function setEventName($EventName)
    {
        $this->EventName = $EventName;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->ProductName;
    }

    /**
     * @param mixed $ProductName
     */
    public function setProductName($ProductName)
    {
        $this->ProductName = $ProductName;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->StartTime;
    }

    /**
     * @param mixed $StartTime
     */
    public function setStartTime($StartTime)
    {
        $this->StartTime = $StartTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->EndTime;
    }

    /**
     * @param mixed $EndTime
     */
    public function setEndTime($EndTime)
    {
        $this->EndTime = $EndTime;
    }

    /**
     * @return mixed
     */
    public function getSeats()
    {
        return $this->Seats;
    }

    /**
     * @param mixed $Seats
     */
    public function setSeats($Seats)
    {
        $this->Seats = $Seats;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param mixed $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    /**
     * @return mixed
     */
    public function getBtw()
    {
        return $this->Btw;
    }

    /**
     * @param mixed $Btw
     */
    public function setBtw($Btw)
    {
        $this->Btw = $Btw;
    }


}