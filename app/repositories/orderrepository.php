<?php

namespace Repositories;

use Repositories\Repository;
use PDO;
use PDOException;

use Models\Order;


class OrderRepository extends Repository
{
    public function InsertOrder($orderStatus, $userID) {
        try {
            $insertOrder = $this->connection->prepare("INSERT INTO `Order` (orderStatus, userID) VALUES (:orderStatus, :userID)");
            $insertOrder->execute(["orderStatus" => $orderStatus, "userID" => $userID]);

            $getOrder = $this->connection->prepare("SELECT orderID FROM `Order` WHERE orderID=(SELECT max(orderID) FROM `Order`)");

            $getOrder->execute();

            while(($row = $getOrder->fetch(PDO::FETCH_ASSOC)) !== false) {
                $order = new Order();
                $order->orderID = $row['orderID'];
            }
            return $order;

        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Order" . $e->getMessage();
        }
    }

    public function InsertTicket($orderID, $eventID, $eventType, $quantity, $comment) {
        try {
            $insertTicket = $this->connection->prepare("INSERT INTO Ticket (eventID, orderID, eventType, quantity, `comment`) VALUES (:eventID, :orderID, :eventType, :quantity, :comment)");
            $insertTicket->execute(["eventID" => $eventID, "orderID" => $orderID, "eventType" => $eventType, "quantity" => $quantity, "comment" => $comment]);
        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Ticket" . $e->getMessage();
        }
    }

    public function updateOrderStatus($orderID, $orderStatus) {
        try {
            $updateOrderStatus = $this->connection->prepare("UPDATE `Order` SET orderStatus =:orderStatus WHERE orderID =:orderID");
            $updateOrderStatus->execute(["orderStatus" => $orderStatus, "orderID" => $orderID]);
        } catch(PDOException $e) {
            echo "Could not retrieve information from the database for the Order" . $e->getMessage();
        }
    }
}
