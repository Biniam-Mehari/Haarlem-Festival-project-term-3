<?php
require_once __DIR__ . '/../components/navigation.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/css/foodreservation.css">
    <title>Food Reservation</title>
</head>


<body>
    <div class="w3-row-padding w3-padding-64 w3-container" style="height: 100%;">
        <div class="w3-col w3-center" style="width: 30%;">
            <img class="w3-xxlarge w3-border-black w3-border" style="height: 100%; width: 100%;" src="/img/<?php echo $restaurantInformation->imageName ?>.png">
        </div>

        <div class="w3-col w3-margin-bottom" style="width: 20%"></div>

        <div class="w3-col" style="width: 70%;">
            <h1 class="restaurant-name" style="font-size: 50px;"><?php echo $restaurantInformation->restaurantName ?></h1>
            <h3 class="restaurant-address" style="font-size: 30px;"><?php echo $restaurantInformation->streetName . ", " . $restaurantInformation->houseNumber . ", " . $restaurantInformation->postalCode . ", " . $restaurantInformation->city ?></h3>
            <p class="restaurant-description" style="font-size: 18px;"><?php echo $restaurantInformation->restaurantDescription ?></p>
            <strong class="restaurant-fee" style="font-size: 20px;">A reservation fee of &euro;<?php echo $restaurantInformation->reservationFee ?> per person will be charged when a reservation is made on our website. This fee will be deducted from the final check on visiting the restaurant</strong>
        </div>
    </div>

    <hr style="border: none; background-color: black; height: 3px; ">

    <h1 style="text-align: center;">Book your table</h1>
    <form class="w3-section w3-container" action="/shoppingcart/addToCart" method="post" id="form">
        <section class="w3-bar">
            <input name="restaurantID" value="<?php echo $restaurantInformation->restaurantID ?>" hidden>
            <input name="address" value="<?php echo $restaurantInformation->streetName . ", " . $restaurantInformation->houseNumber . ", " . $restaurantInformation->postalCode . ", " . $restaurantInformation->city ?>" hidden>
            <input name="reservationFee" value="<?php echo $restaurantInformation->reservationFee ?>" hidden>
            <input name="restaurantName" value="<?php echo $restaurantInformation->restaurantName ?>" hidden>
            <input name="image" value="<?php echo $restaurantInformation->imageName ?>" hidden>
            <label for="date" style="display: flex; font-size: 30px;">Choose session date:</label>
            <select class="w3-select" style="width: 30%;" name="reservationDate" id="selectDate" style="background-color:lavender;" required>
                <option value="" disabled selected place>Choose your date</option>
                <?php
                foreach ($restaurantDateForSessions as $sessionDate) :
                    $startDateFormat = strtotime($sessionDate->startDate);
                    $sessionDates = date('d-m', $startDateFormat);
                ?>
                    <option value="<?php echo $sessionDate->startDate ?>"><?php echo $sessionDates ?></option>
                <?php endforeach ?>
            </select>
        </section>

        <br>
        <section class="w3-bar">
            <label for="time" style="display: flex; font-size: 30px;">Choose session time:</label>
            <select class="w3-select" id="selectTime" style="width: 30%; background-color: lavender;" name="reservationTime" id="time" required>
                <option value="" disabled selected place>Choose your session time</option>
                <?php
                foreach ($restaurantTimeForSessions as $sessionTime) :
                    $startTimeFormat = date('H:i', strtotime($sessionTime->startTime));
                    $startTime = $sessionTime->startTime;
                    $duration = $sessionTime->duration;
                    $endTime = date("H:i", strtotime($startTime) + strtotime($duration) + strtotime('00:00:00'));
                ?>
                    <option value="<?php echo $sessionTime->startTime ?>"><?php echo $startTimeFormat ?> - <?php echo $endTime; ?></option>
                <?php endforeach ?>
            </select>
        </section>
        <br>
        <div>
            <label for="adults" style="font-size: 18px;">Number of adults:</label>
            <input class="w3-input" type="number" style="width:30%;" name="adultAmount" min="0" max="<?php echo $restaurantInformation->seats ?>" id="adults" placeholder="Enter number of adults..." required>
        </div>
        <div>
            <label for="nrOfChildren" style="font-size: 18px;">Number of children: </label>
            <input class="w3-input" type="number" style="width:30%;" name="childAmount" min="0" max="<?php echo $restaurantInformation->seats ?>" id="children" placeholder="Enter number of children..." required>
        </div>

        <br>

        <div>
            <label for="comment" style="font-size: 30px;">Additional comments: </label>
            <textarea class="w3-input" type="text" style="resize: none; width:50%;" name="reservationComment" id="restaurant-comment" placeholder="Enter comment here..."></textarea>
        </div>

        <button type="submit" name="reservationFood" class="w3-button w3-black w3-text-white w3-large w3-hover-grey" style="margin-top: 10px;"><b>Reserve</><i class="fas fa-cart-plus"></i></button>
    </form>
</body>

</html>