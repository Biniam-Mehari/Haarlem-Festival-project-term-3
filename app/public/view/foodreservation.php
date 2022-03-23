<?php
require_once 'navigation.php';
require_once '../controller/foodcontroller.php';

$foodService = new FoodController();
$restaurantID = $_GET['foodEventID'];

$restaurantInfo = $foodService->GetRestaurantById($restaurantID);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/foodreservation.css">
    <title>Food Reservation</title>
</head>

<body>
    <section class="resturant-more-information">
        <section class="container">
            <section class="content">
                <h1 class="restaurant-name"><?php echo $restaurantInfo->getRestaurantName() ?></h1>
                <h3 class="restaurant-address"><?php echo $restaurantInfo->getAddress() ?></h3>
                <p class="restaurant-description"><?php echo $restaurantInfo->getDescription() ?></p>
                <strong class="restaurant-fee">A reservation fee of &euro;<?php echo $restaurantInfo->getReservationFee() ?> per person will be charged when a reservation is made on our website. This fee will be deducted from the final check on visiting the restaurant</strong>
            </section>
            <section class="image-section">
                <img class="restaurant-image" src="../img/<?php echo $restaurantInfo->getImageName() ?>.png">
            </section>
        </section>
    </section>

    <br>
    <br>

    <?php
    $sessions = $restaurantInfo->getSessions();
    $startDateTime = $restaurantInfo->getStartTime();
    $durationPlus = $restaurantInfo->getDuration() * 60;
    $startTime = strtotime($startDateTime);
    $dayDuration = 60 * 60 * 24;

    ?>

    <section class="restaurant-booking">
        <h1>Book your table</h1>
    </section>
    <section class="restaurant-reservation">
        <form action="" method="post" class="form-container">
            <div class="main-form">
                <form action="index.php" method="get">
                    <div>
                        <span>Date and Time:</span>
                        <select name="people" id="people" required>
                            <?php for ($day = 0; $day < 4; $day++) {
                                for ($session = 0; $session < $sessions; $session++) {
                                    $time = (($session * $durationPlus) + $startTime) + ($day * $dayDuration);
                                    $sessionTimes = date('d-m H:i', $time);
                                    ?>
                                    <option value="<?php echo $restaurantInfo->getStartTime() ?>"><?php echo $sessionTimes ?></option>
                                    <?php }
                            }?>
                        </select>
                    </div>
                    <div>
                        <span>Number of adults: </span>
                        <input type="text" name="restaurant-adults" id="restaurant-adults" placeholder="Enter number of adults..." required>
                    </div>
                    <div>
                        <span>Number of children: </span>
                        <input type="text" name="restaurant-children" id="restaurant-children" placeholder="Enter number of children..." required>
                    </div>
                    <div>
                        <span>Additional comments: </span>
                        <textarea type="text" style="resize: none;" cols="100" rows="10" name="restaurant-comment" id="restaurant-comment" placeholder="Enter comment here..." required></textarea>
                    </div>
                    <div id="submit">
                        <input type="submit" value="SUBMIT" id="submit">
                    </div>
                </form>
            </div>

            <?php

            ?>
        </form>
    </section>
</body>

</html>