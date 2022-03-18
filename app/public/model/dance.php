<?php
Class Dance
{
    private $Event_ID;
    private $ArtistName;
    private $Duration;
    private $Location;
    private $Image;
    private $Event;

    function __construct($Event_ID, $ArtistName, $Duration, $Location, $Image, $StartTime, $EndTime, $Price)
    {
        $this->Event_ID = $Event_ID;
        $this->ArtistName = $ArtistName;
        $this->Duration = $Duration;
        $this->Location = $Location;
        $this->Image = $Image;
        $this->Event = new Event($StartTime, $EndTime, $Price);
    }
    public function getEvent_ID()
    {
        return $this->Event_ID;
    }

    public function setEvent_ID($Event_ID)
    {
        $this->Event_ID = $Event_ID;
    }

    /**
     * @return mixed
     */
    public function getArtistName()
    {
        return $this->ArtistName;
    }

    /**
     * @param mixed $ArtistName
     */
    public function setBandName($ArtistName)
    {
        $this->ArtistName = $ArtistName;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->Duration;
    }

    /**
     * @param mixed $Duration
     */
    public function setDuration($Duration)
    {
        $this->Duration = $Duration;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->Location;
    }

    /**
     * @param mixed $Location
     */
    public function setLocation($Location)
    {
        $this->Location = $Location;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    /**
     * @param mixed $Image
     */
    public function setImage($Image)
    {
        $this->Image = $Image;
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