<?php
require_once dirname(__FILE__) . '/../Model/Combi.php';
require_once dirname(__FILE__) . '../../../db.php';

class CombiDAL
{
    private $connection;
    private $instance;

    //makes the connection to the database
    function __construct()
    {
        $this->instance = DB::getInstance();
        $this->connection = $this->instance->getConnection();
    }

    function GetCombiEventsByName($ticketName1, $ticketName2)
    {
        //prepared statement
        $stmt = $this->connection->prepare("SELECT C.Event_ID, E.Price, C.TicketName FROM Event E INNER JOIN Event_Combi C ON E.Event_ID = C.Event_ID WHERE C.TicketName = ? OR C.TicketName = ?");
        $stmt->bind_param("ss", $ticketName1, $ticketName2 );
        $stmt->execute();
	    $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
                $Event_ID = $row["Event_ID"];
                $Price = $row["Price"];
                $TicketName = $row["TicketName"];

                $Combi = new Combi($Event_ID, $Price, $TicketName);
                $CombiEvents[] = $Combi;
        }
        return $CombiEvents;
    }
}

?>