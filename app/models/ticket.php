<?php

namespace Models;


class Ticket {
    public int $ticketID;
    public int $eventID;
    public int $orderID;
    public int $quantity;
    public string $comment;
}