<?php

namespace Models;

class Order {
    public int $orderID;
    public OrderStatus $orderStatus;
    public int $userID;
}

