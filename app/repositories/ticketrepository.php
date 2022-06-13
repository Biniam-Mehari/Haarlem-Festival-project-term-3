<?php

namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Ticket;


class TicketRepository extends Repository
{
    public function InsertTicket($ticket) {
        try {
            $insertTicket = $this->connection->prepare("INSERT INTO `Ticket` (eventID, orderID, quantity, comment) VALUES (:eventID, :orderID, :quantity, :comment)");
            $insertTicket->execute(["eventID" => $ticket->eventID, "orderID" => $ticket->orderID,
             "quantity" => $ticket->quantity, "comment" => $ticket->comment]);
        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Ticket" . $e->getMessage();
        }
    }
}
