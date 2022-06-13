<?php

namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Order;


class OrderRepository extends Repository
{
    public function InsertOrder($order) {
        try {
            $insertTicket = $this->connection->prepare("INSERT INTO `Order` (orderStatus, userID) VALUES (:orderStatus, :userID)");
            $insertTicket->execute(["orderStatus" => $order->orderStatus, "userID" => $order->userID]);
        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Ticket" . $e->getMessage();
        }
    }
}
