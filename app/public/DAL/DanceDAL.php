<?php
require_once dirname(__FILE__) . '/../Model/Dance.php';
require_once dirname(__FILE__) . '../../../db.php';

class DanceDAL
{
    private $connection;
    private $instance;

    //makes the connection to the database
    function __construct()
    {
        $this->instance = DB::getInstance();
        $this->connection = $this->instance->getConnection();
    }

    function GetDanceEventsByDay($TimeStartDay, $TimeEndDay)
    {
        //prepared statement
        $stmt = $this->connection->prepare("SELECT E.StartTime, E.EndTime , E.Price, D.Event_ID, D.ArtistName, D.Duration, D.Image, D.Location FROM Event E INNER JOIN Event_Dance D ON E.Event_ID = D.Event_ID WHERE E.EventName = 'Dance' AND E.StartTime >= ? AND StartTime < ? ORDER BY E.StartTime ASC");
        $stmt->bind_param("ss", $TimeStartDay, $TimeEndDay);
        $stmt->execute();
	    $result = $stmt->get_result(); 
        while ($row = $result->fetch_assoc()) {

                $StartTime = $row["StartTime"];
                $EndTime = $row["EndTime"];
                $Price = $row["Price"];
                $Event_ID=$row["Event_ID"];
                $ArtistName = $row["ArtistName"];
                $Duration = $row["Duration"];
                $Image = $row["Image"];
                $Location = $row["Location"];

                $Dance = new Dance($Event_ID,$ArtistName, $Duration, $Location, $Image, $StartTime, $EndTime, $Price);
                $DanceEvents[] = $Dance;
        }
        return $DanceEvents;
        
    }
    
     //for program
     function GetAllDanceTickets()
     {
        //prepared statement
        $stmt = $this->connection->prepare("SELECT E.StartTime, E.EndTime , E.Price, D.Event_ID, D.ArtistName, D.Duration, D.Image, D.Location FROM Event E INNER JOIN Event_Dance D ON E.Event_ID = D.Event_ID WHERE E.EventName = 'Dance' ORDER BY E.StartTime ASC");
        $stmt->execute();
	    $result = $stmt->get_result(); 
        while ($row = $result->fetch_assoc()) {

                 $StartTime = $row["StartTime"];
                 $EndTime = $row["EndTime"];
                 $Price = $row["Price"];
                 $Event_ID=$row["Event_ID"];
                 $ArtistName = $row["ArtistName"];
                 $Duration = $row["Duration"];
                 $Image = $row["Image"];
                 $Location = $row["Location"];
 
                 $Dance = new Dance($Event_ID,$ArtistName, $Duration, $Location, $Image, $StartTime, $EndTime, $Price);
                 $DanceEvents[] = $Dance;
        }
        return $DanceEvents;
     }
}

?>