<?php
require_once __DIR__ . '/../components/navigation.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dancemain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <title>Dance</title>
</head>

<body>
    <section class="dance-banner">
        <img class="dance-banner-image" src="/img/dancePage.png">
      
        <h1 class="dance-title">Dance</h1>
        <!-- <p class="food-description">Taste some of the most exquisite cuisines that the Haarlem Festival has to offer!</p> -->
    </section>

    <h1 class="display-title">Visit one of our dance events</h1>

    <section class="dances">
        <main class="grid">
            <?php
                 foreach($events as $event):
            ?>
            <article>
                <section class="dance-content">
                    <h2 class="dance-header"><?php echo $event->Venue->getVenueName() ?></h2>
                    <!-- <img class="restaurant-image" src="/img/Afrojack.jpg"> -->
                    <img  src="/img/<?php echo $event->Artist->getImage_id() ?>.png">                
                    <h1 class="dance-cuisine">Artist: <?php echo $event->Artist->getArtistName() ?></h1>
                    

                    <h3 class="dance-address">Location: <?php echo $event->Venue->getAdress()  . " " . $event->Venue->getHousenumber() . ", " . $event->Venue->getPostcode() . ", " . $event->Venue->getCity()?></h3>
                    <strong class="dance-price">Price: &euro;<?php echo $event->getPrice() ?></strong>
                    <h3 class="dance-seats">Date <?php echo $event->getDate() . " " . $event->getStartTime() ?></h3>

                    <a href="/dance/GetDanceInformationByID?id=<?php echo $event->getEventId()?>">
                    <button class="order-button">Order Ticket</button>
                    </a>
                </section>
            </article>

            <?php endforeach ?>
            <article>

                <section class="dance-content">
                    <h2 class = "dance-header">All acces pass</h2>
                    <label>Single day or all days on the event</label>
                    <img class="restaurant-image" src="/img/AllAccess.png">
                    <a href="/dance/GetDanceInformationByID?id=<?php echo $event->getEventId()?>">
                    <button class="order-button">Order Ticket</button>
                    </a>
                </section>
            </article>

        </main>
    </section>
</body>

</html>