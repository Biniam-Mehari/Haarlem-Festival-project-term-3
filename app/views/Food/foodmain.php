<?php
require_once __DIR__ . '/../components/navigation.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/foodmain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <title>Food</title>
</head>

<body>
    <section class="food-banner">
        <img class="food-banner-image" src="/img/foodbanner.png">
        <h1 class="food-title">Food</h1>
        <p class="food-description">Taste some of the most exquisite cuisines that the Haarlem Festival has to offer!</p>
    </section>

    <h1 class="display-title">Visit one of our restaurants</h1>

    <section class="restaurants">
        <main class="grid">
            <?php
                 foreach($restaurants as $restaurant):
            ?>
            <article>
                <img class="restaurant-image" src="/img/<?php echo $restaurant->imageName ?>.png">
                <section class="restaurant-content">
                    <h2 class="restaurant-header"><?php echo $restaurant->restaurantName ?></h2>
                    <h1 class="restaurant-cuisine"><?php echo $restaurant->cuisineType ?></h1>
                    <h3 class="restaurant-address"><?php echo $restaurant->streetName . ", " . $restaurant->houseNumber . ", " . $restaurant->postalCode . ", " . $restaurant->city?></h3>
                    <section class="restaurant-rating">
                    <?php for($stars = 0; $stars < $restaurant->rating; $stars++) { ?>
                        <i class="fas fa-star"></i>
                    <?php } ?>
                    </section>
                    <h3 class="restaurant-seats">Restaurant contains <?php echo $restaurant->seats ?> seats</h3>
                    <strong class="restaurant-price">Price per person: &euro;<?php echo $restaurant->price ?></strong>
                    <a href="/food/foodreservation?restaurantID=<?php echo $restaurant->restaurantID?>">
                    <button class="reservation-button">Make a reservation</button>
                    </a>
                </section>
            </article>
            <?php endforeach ?>
        </main>
    </section>
</body>

</html>