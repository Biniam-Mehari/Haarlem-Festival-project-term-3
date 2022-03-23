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

        <br>

        <section class="restaurant-reservation">
            <form action="" method="post" class="form-container">
                <h1 id="reservation-restaurant"><?php echo $restaurantInfo->getRestaurantName() ?></h1>
                
                <?php
                $sessions = $restaurantInfo->getSessions();
                $startDateTime = $restaurantInfo->getStartTime();
                $durationPlus = $restaurantInfo->getDuration() * 60;
                $startTime = strtotime($startDateTime);
                $dayDuration = 60 * 60 * 24;


                for($day = 0; $day < 4; $day++) {
                    for($session = 0; $session < $sessions; $session++) {
                        $time = (($session * $durationPlus) + $startTime) + ($day * $dayDuration);
                        $sessionTimes = date('d-m H:i', $time);
                        echo $sessionTimes . " ";
                        
                    }
                }

                ?>
            </form>
        </section>
</body>

</html>