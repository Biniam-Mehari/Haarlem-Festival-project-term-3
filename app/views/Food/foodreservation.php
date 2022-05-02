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
    <?php foreach ($restaurantInformation as $resInfo) : ?>
        <div class="w3-row-padding w3-padding-64 w3-container" style="height: 100%;">
            <div class="w3-col w3-center" style="width: 30%;">
                <img class="w3-xxlarge w3-border-black w3-border" style="height: 100%; width: 100%;" src="/img/<?php echo $resInfo->imageName ?>.png">
            </div>

            <div class="w3-col w3-margin-bottom" style="width: 20%"></div>

            <div class="w3-col" style="width: 70%;">
                <h1 class="restaurant-name" style="font-size: 50px;"><?php echo $resInfo->restaurantName ?></h1>
                <h3 class="restaurant-address" style="font-size: 30px;"><?php echo $resInfo->streetName . ", " . $resInfo->houseNumber . ", " . $resInfo->postalCode . ", " . $resInfo->city ?></h3>
                <p class="restaurant-description" style="font-size: 18px;"><?php echo $resInfo->restaurantDescription ?></p>
                <?php foreach ($sessionInformation as $sesInfo) : ?>
                    <strong class="restaurant-fee" style="font-size: 20px;">A reservation fee of &euro;<?php echo $sesInfo->reservationFee ?> per person will be charged when a reservation is made on our website. This fee will be deducted from the final check on visiting the restaurant</strong>
                <?php endforeach ?>
            </div>
        </div>
    <?php endforeach ?>

    <hr style="border: none; background-color: black; height: 3px; ">

    <h1 style="text-align: center;">Book your table</h1>
    <form class="w3-section w3-container" action="index.php" method="post" id="form">
        <section class="w3-bar">
            <label for="date" style="display: flex; font-size: 30px;">Choose session date:</label>
            <select class="w3-select" style="width: 30%;" name="date" id="selectDate" style="background-color:lavender;" required>
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

        <script>
            function configureDropDownLists(selectDate, selectTime) {

                var teams = ['Square', 'Circle', 'Triangle'];
                var names = ['John', 'David', 'Sarah'];

                switch (ddl1.value) {
                    case 'Colours':
                        ddl2.options.length = 0;
                        for (i = 0; i < menubars.length; i++) {
                            createOption(ddl2, menubars[i], menubars[i]);
                        }
                        break;
                    case 'Shapes':
                        ddl2.options.length = 0;
                        for (i = 0; i < teams.length; i++) {
                            createOption(ddl2, teams[i], teams[i]);
                        }
                        break;
                    case 'Names':
                        ddl2.options.length = 0;
                        for (i = 0; i < names.length; i++) {
                            createOption(ddl2, names[i], names[i]);
                        }
                        break;
                    default:
                        ddl2.options.length = 0;
                        break;
                }

            }

            function createOption(ddl, text, value) {
                var opt = document.createElement('option');
                opt.value = value;
                opt.text = text;
                ddl.options.add(opt);
            }
        </script>
        <br>
        <section class="w3-bar">
            <label for="time" style="display: flex; font-size: 30px;">Choose session time:</label>
            <select class="w3-select" id="selectTime" style="width: 30%; background-color: lavender;" name="time" id="time" required>
                <!-- <option value="" disabled selected place>Choose your session time</option>
                    <?php
                    //foreach($restaurantTimeForSessions as $sessionTime):
                    //$startTimeFormat = date('H:i', strtotime($sessionTime->startTime));
                    //$startTime = $sessionTime->startTime;
                    //$duration = $sessionTime->duration;
                    //$endTime = date("H:i", strtotime($startTime) + strtotime($duration) + strtotime('00:00:00'));


                    ?>
                     <option value="<?php echo $sessionTime->startTime ?>"><?php echo $startTimeFormat ?> - <?php echo $endTime; ?></option>
                     <?php //endforeach 
                        ?> -->
            </select>
        </section>
        <br>
        <div>
            <label for="adults" style="font-size: 18px;">Number of adults:</label>
            <input class="w3-input" type="number" style="width:30%;" name="adultAmount" min="0" max="10" id="adults" placeholder="Enter number of adults..." required>
        </div>
        <div>
            <label for="nrOfChildren" style="font-size: 18px;">Number of children: </label>
            <input class="w3-input" type="time" style="width:30%;" name="childAmount" min="0" max="10" id="children" placeholder="Enter number of children..." required>
        </div>

        <br>

        <div>
            <label for="comment" style="font-size: 30px;">Additional comments: </label>
            <textarea class="w3-input" type="text" style="resize: none; width:50%;" name="restaurant-comment" id="restaurant-comment" placeholder="Enter comment here..."></textarea>
        </div>

        <button type="submit" name="reserveButton" class="w3-button w3-black w3-text-white w3-large w3-hover-grey" style="margin-top: 10px;"><b>Reserve</><i class="fas fa-cart-plus"></i></button>
    </form>
</body>

</html>