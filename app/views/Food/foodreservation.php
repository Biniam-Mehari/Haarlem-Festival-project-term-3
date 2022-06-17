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

        <section class="container mt-5 p-5 col-10 col-md-6 col-lg-4 col-xl-7" style="background-color: white;">
            <div class="container">
                <h1 style="text-align: center;">Book your table</h1>
                <form action="/shoppingcart/addToCart" method="post" id="form">
                    <div class="form-group mt-3">
                        <input name="restaurantID" value="<?php echo $restaurantInformation->restaurantID ?>" hidden>
                        <input name="address" value="<?php echo $restaurantInformation->streetName . ", " . $restaurantInformation->houseNumber . ", " . $restaurantInformation->postalCode . ", " . $restaurantInformation->city ?>" hidden>
                        <input name="reservationFee" value="<?php echo $restaurantInformation->reservationFee ?>" hidden>
                        <input name="restaurantName" value="<?php echo $restaurantInformation->restaurantName ?>" hidden>
                        <input name="image" value="<?php echo $restaurantInformation->imageName ?>" hidden>
                        <label for="date" style="font-size: 25px;">Choose session date:</label>
                        <select class="form-select" name="reservationDate" id="date" required>
                            <option value="" disabled selected place>Choose your date</option>
                            <?php
                            foreach ($restaurantDateForSessions as $sessionDate) :
                                $startDateFormat = strtotime($sessionDate->startDate);
                                $sessionDates = date('d-m', $startDateFormat);
                            ?>
                                <option value="<?php echo $sessionDate->startDate ?>"><?php echo $sessionDates ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="time" style="font-size: 25px;">Choose session time:</label>
                        <select class="form-select" name="reservationTime" id="time" required>
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
                    </div>
                    <div class="form-group mt-3">
                        <label for="adults" style="font-size: 20px;">Number of adults:</label>
                        <input class="form-control" type="number" name="adultAmount" min="0" max="<?php echo $restaurantInformation->seats ?>" id="adults" placeholder="Enter number of adults..." required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="children" style="font-size: 20px;">Number of children: </label>
                        <input class="form-control" type="number" name="childAmount" min="0" max="<?php echo $restaurantInformation->seats ?>" id="children" placeholder="Enter number of children..." required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="comment" style="font-size: 25px;">Additional comments: </label>
                        <textarea class="form-control" type="text" style="resize: none;" name="reservationComment" id="comment" rows="3" placeholder="Enter comment here..."></textarea>
                    </div>

                    <button type="submit" name="reservationFood" class="btn btn-block btn-lg mb-4 col-12 mt-3 p-2" style="background-color: #a00c0c; color: white;">Place your reservation</button>
                </form>
            </div>
        </section>
</body>

</html>