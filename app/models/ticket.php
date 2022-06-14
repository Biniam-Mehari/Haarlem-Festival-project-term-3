<?php

namespace Models;


class Ticket {
    public int $ticketID;
    public int $eventID;
    public int $orderID;
    public string $eventType;
    public int $quantity;
    public string $comment;
}