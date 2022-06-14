<?php

namespace Services;
use Repositories\OrderRepository;

// service treats repository as the DAL layer and calls the methods from there

class OrderService {

    private $orderRepository;

    function __construct() {
        $this->orderRepository = new OrderRepository();
    }

    public function InsertOrder($orderStatus, $userID) {
        return $this->orderRepository->InsertOrder($orderStatus, $userID);
    }
    public function InsertTicket($orderID, $eventID, $eventType, $quantity, $comment) {
        return $this->orderRepository->InsertTicket($orderID, $eventID, $eventType, $quantity, $comment);
    }
}