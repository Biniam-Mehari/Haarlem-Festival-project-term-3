<?php
require_once __DIR__ . '/components/navigation.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/shoppingcart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <title>Shopping cart</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Shopping Cart</b></h4>
                            </div>
                            <div class="col align-self-center text-right text-muted"><?php echo $totalEvents ?> items</div>
                            <form method="post" action="/shoppingcart/removeAll">
                                <button class="btn btn-warning col align-self-center text-right" name="removeAllButton"> Remove all</button>
                            </form>
                        </div>
                    </div>
                    <?php foreach ($_SESSION['reservations'] as $event) :
                        if ($event['type'] == 'Food') {

                    ?>
                            <div class="row border-top border-bottom">
                                <div class="row main align-items-center">
                                    <div class="col-2"><img class="img-fluid" style="height: 100px; width: 100px;" src="/img/<?php echo $event['image'] ?>.png"></div>
                                    <div class="col">
                                        <div class="row text-muted"> Restaurant: <?php echo $event['restaurantName'] ?></div>
                                        <div class="row">Date: <?php echo $event['date'] ?></div>
                                        <div class="row text-muted">Time: <?php echo $event['time'] ?></div>
                                        <div class="row">Address: <?php echo $event['address'] ?></div>
                                        <div class="row">Comment: <?php echo $event['reservationComment'] ?></div>
                                    </div>
                                    <div class="col">
                                    <form method="post" action="/shoppingcart/changeQuantity">

                                            <input name="restaurantID" value="<?php echo $event['restaurantID'] ?>" hidden>
                                            <input name="date" value="<?php echo $event['date'] ?>" hidden>
                                            <input name="time" value="<?php echo $event['time'] ?>" hidden>
                                            <input name="reservationFee" value="<?php echo $event['reservationFee'] ?>" hidden>
                                            <button class="btn btn-danger" name="subtractQuantity">-</button><a class="border"><?php echo $event['quantity'] ?></a><button class="btn btn-success" name="addQuantity">+</button>
                                    </form>
                                    </div>
                                    <div class="col">&euro; <?php echo $event['totalPrice'] ?> <span class="close">&#10005;</span></div>
                                    <div class="col">
                                    <form action="/shoppingcart/removeItem" method="post">
                                        <input name="restaurantID" value="<?php echo $event['restaurantID'] ?>" hidden>
                                        <input name="date" value="<?php echo $event['date'] ?>" hidden>
                                        <input name="time" value="<?php echo $event['time'] ?>" hidden>
                                        <div class="col">
                                            <button class="btn btn-danger" name="removeButton">Remove</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        if ($event['type'] == 'Dance') {
                        ?>
                            <div class="row border-top border-bottom">
                                <form action="/shoppingcart/removeItem" method="post">
                                    <input name="danceID" value="<?php echo $event['danceID'] ?>" hidden>
                                    <div class="row main align-items-center">
                                        <div class="col-2"><img class="img-fluid" style="height: 100px; width: 100px;" src="/img/Afrojack.jpg"></div>
                                        <div class="col">
                                            <div class="row text-muted"> Venue: <?php echo $event['venueName'] ?></div>
                                            <div class="row"> Artist: <?php echo $event['artistName'] ?></div>
                                            <div class="row"> Date: <?php echo $event['date'] ?></div>
                                            <div class="row "> Time: <?php echo $event['startTime'] ?></div>
                                            <div class="row"> Address: <?php echo $event['venueAddress'] ?></div>
                                            <div class="row"> Price: <?php echo $event['price'] ?></div>
                                        </div>
                                        <form method="post" action="/shoppingcart/changeQuantity">
                                            <div class="col">
                                                <button class="btn btn-danger" name="substractQuantity">-</button><a class="border"><?php echo $event['amount'] ?></a><button class="btn btn-success" name="addQuantity">+</button>
                                            </div>
                                        </form>
                                        <div class="col">&euro; <?php echo $event['totalPrice'] ?> <span class="close">&#10005;</span></div>
                                        <div class="col">
                                            <button class="btn btn-danger" name="removeButtonDance">Remove</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <?php
                        }
                    endforeach ?>
                    <div class="back-to-shop"><a href="/food">&leftarrow;<span class="text-muted">Explore more</span></a></div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <form action="/order/addOrder" method="post">
                        <div class="row">
                            <div class="col" style="padding-left:0;">NUMBER OF EVENTS: </div>
                            <div class="col text-right"><?php echo $totalEvents ?></div>
                        </div>
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">TOTAL PRICE</div>
                            <div class="col text-right">&euro; <?php echo $_SESSION['totalAmount'] ?></div>
                        </div>
                        <button class="button-pay" name="addOrder" href="">CHECKOUT</button>
                    </form>
                </div>
            </div>
        </div>

</body