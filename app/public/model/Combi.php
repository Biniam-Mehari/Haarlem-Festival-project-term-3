<?php

class Combi
{
    private $TicketName;
    private $Event_ID;

    /**
     * @return mixed
     */
    public function getEvent_ID()
    {
        return $this->Event_ID;
    }

    /**
     * @param mixed $Event_ID
     */
    public function setEvent_ID($Event_ID)
    {
        $this->Event_ID = $Event_ID;
    }
    private $Event;

    function __construct($Event_ID, $Price, $TicketName)
    {
        $this->Event_ID = $Event_ID;
        $this->Event = new Event( $Price);
        $this->TicketName = $TicketName;
    }

    /**
     * @return mixed
     */
    public function getTicketName()
    {
        return $this->TicketName;
    }

    /**
     * @param mixed $TicketName
     */
    public function setTicketName($TicketName)
    {
        $this->TicketName = $TicketName;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->Event;
    }

    /**
     * @param Event $Event
     */
    public function setEvent($Event)
    {
        $this->Event = $Event;
    }

}