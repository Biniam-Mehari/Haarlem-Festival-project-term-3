<?php

namespace Models;
Class Artist
{
    private $artistId;
    private $artistName;
    private $Style;
    private $YouTube;
    private $Instagram;
    private $TicTok;
    private $Facebook;
    private $Description;
    private $Image_id;

    public function __construct()

    {

        $get_arguments  = func_get_args();

        $number_of_arguments = func_num_args();

        if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {

            call_user_func_array(array($this, $method_name), $get_arguments);

        }

    }
    function __construct1($ArtistName)
    {
        $this->ArtistName = $ArtistName;
    }
    function __construct2($Artist_id,$ArtistName)
    {
        $this->Artist_id = $Artist_id;
        $this->ArtistName = $ArtistName;
    }
    function __construct8($artistName, $style, $youtube,$instaGram,$tikTok,$faceBook,$description,$imageId)
    {
        
        $this->ArtistName = $artistName;
        $this->Style = $style;
        $this->YouTube = $youtube;
        $this->Instagram = $instaGram;
        $this->TicTok = $tikTok;
        $this->Facebook = $faceBook;
        $this->Description = $description;
        $this->Image_id = $imageId;
    }

    

    

    /**
     * Get the value of Style
     */ 
    public function getStyle()
    {
        return $this->Style;
    }

    /**
     * Set the value of Style
     *
     * @return  self
     */ 
    public function setStyle($Style)
    {
        $this->Style = $Style;

        return $this;
    }

    /**
     * Get the value of YouTube
     */ 
    public function getYouTube()
    {
        return $this->YouTube;
    }

    /**
     * Set the value of YouTube
     *
     * @return  self
     */ 
    public function setYouTube($YouTube)
    {
        $this->YouTube = $YouTube;

        return $this;
    }

    /**
     * Get the value of Instagram
     */ 
    public function getInstagram()
    {
        return $this->Instagram;
    }

    /**
     * Set the value of Instagram
     *
     * @return  self
     */ 
    public function setInstagram($Instagram)
    {
        $this->Instagram = $Instagram;

        return $this;
    }

    /**
     * Get the value of TicTok
     */ 
    public function getTicTok()
    {
        return $this->TicTok;
    }

    /**
     * Set the value of TicTok
     *
     * @return  self
     */ 
    public function setTicTok($TicTok)
    {
        $this->TicTok = $TicTok;

        return $this;
    }

    /**
     * Get the value of Facebook
     */ 
    public function getFacebook()
    {
        return $this->Facebook;
    }

    /**
     * Set the value of Facebook
     *
     * @return  self
     */ 
    public function setFacebook($Facebook)
    {
        $this->Facebook = $Facebook;

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
     * Get the value of artistId
     */ 
    public function getArtistId()
    {
        return $this->artistId;
    }

    /**
     * Set the value of artistId
     *
     * @return  self
     */ 
    public function setArtistId($artistId)
    {
        $this->artistId = $artistId;

        return $this;
    }

    /**
     * Get the value of artistName
     */ 
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * Set the value of artistName
     *
     * @return  self
     */ 
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;

        return $this;
    }
}
