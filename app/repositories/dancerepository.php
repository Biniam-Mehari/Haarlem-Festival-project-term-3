<?php

namespace Repositories;

use Repositories\Repository;

use PDO;

use PDOException;

use Models\Dance;

use Models\Venue;

use Models\Artist;

class DanceRepository extends Repository
{
    public function GetAllDanceEventsInformation()
    {
        try {

            $stmt = $this->connection->prepare("SELECT eventId, venueName,artistName,`date`,adress,houseNumber,postCode,city,price,startTime,duration FROM Dance AS d INNER JOIN Artist AS a ON d.artistId = a.artistId INNER JOIN Venue AS v ON d.venueId = v.venueId");

            $stmt->execute();



            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {

                $venue = new Venue();

                $artist = new Artist();

                $danceevent = new Dance();

                $danceevent->setEventId($row["eventId"]);

                $danceevent->setDate($row["date"]);

                $danceevent->setPrice($row["price"]);

                $danceevent->setDate($row["date"]);

                $danceevent->setStartTime($row["startTime"]);

                $danceevent->setDuration($row["duration"]);

                $venue->setVenueName($row["venueName"]);

                $artist->setArtistName($row["artistName"]);

                $venue->setAdress($row["adress"]);
                
                $venue->setHousenumber($row["houseNumber"]);

                $venue->setPostcode($row["postCode"]);

                $venue->setCity($row["city"]);

                $danceevent->Venue = $venue;

                $danceevent->Artist = $artist;

                $results[] = $danceevent;
            }

            return $results;
        } catch (PDOException $ex) {



            echo "connection failed" . $ex->getMessage();
        }
    }

    public function GetDanceInformationByID($id) {
        try {
            $stmt = $this->connection->prepare("SELECT d.specialguest, d.eventSession,d.duration,d.capacity,d.price,d.vat,d.date,d.startTime,d.imageId,v.venueName,v.adress,v.houseNumber,v.postCode,v.city,v.venueDescription,v.imageID,a.artistName,a.style,a.youtube,a.instaGram,a.tikTok,a.faceBook,a.artistDescription,a.imageId FROM Dance AS d INNER JOIN Artist AS a ON d.artistId = a.artistId INNER JOIN Venue AS v ON d.venueId = v.venueId WHERE eventId = :eventId");

            $stmt->execute(["eventId" => $id]);


            $danceevent = new Dance();
            while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {

                $venue = new Venue();

                $artist = new Artist();

                

                $danceevent->setSpecialGuest($row["specialguest"]);

                $danceevent->setSession($row["eventSession"]);

                $danceevent->setDuration($row["duration"]);

                $danceevent->setCapacity($row["capacity"]);

                $danceevent->setPrice($row["price"]);

                $danceevent->setVat($row["vat"]);

                $danceevent->setDate($row["date"]);

                $danceevent->setStartTime($row["startTime"]);

                $danceevent->setImageid($row["imageId"]);


                $artist->setArtistName($row["artistName"]);

                $artist->setStyle($row["style"]);

                $artist->setYouTube($row["youtube"]);

                $artist->setInstagram($row["instaGram"]);

                $artist->setTicTok($row["tikTok"]);

                $artist->setFacebook($row["faceBook"]);

                $artist->setDescription($row["artistDescription"]);

                $artist->setImage_id($row["imageId"]);
                
              
                $venue->setVenueName($row["venueName"]);

                $venue->setAdress($row["adress"]);
                
                $venue->setHousenumber($row["houseNumber"]);

                $venue->setPostcode($row["postCode"]);

                $venue->setCity($row["city"]);

                $venue->setDescription($row["venueDescription"]);

                $venue->setImage_id($row["imageID"]);


                $danceevent->Venue = $venue;

                $danceevent->Artist = $artist;

            }

            return $danceevent;
        } catch (PDOException $ex) {



            echo "connection failed" . $ex->getMessage();
        }
    }

}
