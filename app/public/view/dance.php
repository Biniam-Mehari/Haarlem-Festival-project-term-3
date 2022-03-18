<?php
require_once 'navigation.php';
require_once '../controller/DanceLogic.php';
require_once '../controller/CombiLogic.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dancePage.css">
    <title>dance</title>
    <p>Home > Dance </p>
    <img class="banner" src="../img/dancePage.png" alt="bannerHome">
    
</head>


<body>
    <h1> Artist </h1>
    <img class="image" src="../img/NickyRomero.jpg" class="img-fluid">
    <img class="image" src="../img/Arminvanbuuren.jpg" class="img-fluid">
    <img class="image"  src="../img/Hardwellfilter.jpg" class="img-fluid">
    <img class="image"  src="../img/MartinGarrix.jpg" class="img-fluid">
    <img class="image" src="../img/Triesto.jpg" class="img-fluid">
    <img class="image" src="../img/Afrojack.jpg" class="img-fluid">

    <!--row Days -->
    <section class="DaysRow">
        <button class="dayButton dayActive" onclick="filterSelection('ticketsFriday')" id="fridayBtn">
            Friday, Jul 27th
        </button>
        <button class="dayButton" onclick="filterSelection('ticketsSaturday')" id="saturdayBtn">
            Saturday, Jul 28th
        </button>
        <button class="dayButton" onclick="filterSelection('ticketsSunday')" id="sundayBtn">
            Sunday, Jul 29th
        </button>
    </section>
    <!-- Filter on day buttons -->

    <script>
        //Function to make the buttons work and filter different ticket section
        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("grid-container");
            if (c == "all") c = "";
            // Add the "show" class (display:grid) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        var btns = document.getElementsByClassName("dayButton");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("dayActive");
                if (current.length > 0) {
                    current[0].className = current[0].className.replace("dayActive", "");
                }
                this.className = "dayButton dayActive";
            });
        }
    </script>

    <!--tickets -->

    </div>


    <!-- tickets friday -->
    <section class="grid-container ticketsFriday show" id="ticketsFriday">
        <?php
        $DanceEvents = [];
        $danceLogic = new DanceLogic();
        $DanceEvents = (array)$danceLogic->GetAllDanceEvents("2018-07-27 00:00:00", "2018-07-28 00:00:00");
        //Fill array with the two combi events
        $CombiEvents = [];
        $combiLogic = new CombiLogic();
        $CombiEvents = (array)$combiLogic->GetAllCombiEventsByName("All-Access Friday Dance", "All-Access Weekend Dance");

        $i = 1;
        ?>
        <?php
        foreach ($DanceEvents as $dance) {
            ?>
            <section name="ticket<?php echo $i ?>Title" class="ticket<?php echo $i ?>Title"
                     id="ticket<?php echo $dance->getEvent_ID() ?>Title"><?php echo $dance->getArtistName() ?></section>
            <section class="ticket<?php echo $i ?>Detail" id="ticket<?php echo $dance->getEvent_ID() ?>Detail">

                <section class="leftsideDetail">
                    <img class="imagesLeft" src="images/<?php echo $dance->getImage(); ?>.jpg">
                </section>
                <section class="rightsideDetail">
                    <label class="dayLabel ">Date:<?php echo $dayFormat = date("d/m/y", strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="timeLabel">Time:<?php echo $timeFormat = date('H:i', strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="locationLabel">Location:<?php echo $dance->getLocation() ?></label>
                    <br>
                    <label class="durationLabel">Duration:<?php echo $dance->getDuration() ?>min</label>
                    <br>
                    <label class="priceLabel">Price:€<?php echo number_format((float)$dance->getEvent()->getPrice(), 2, ',', ''); ?></label>
                    <br>
                    <br>

                    <button class="buyTicket<?php echo $i ?>Btn"
                            onclick="showBuyTicket('buyTicket<?php echo $dance->getEvent_ID() ?>', 'ticket<?php echo $dance->getEvent_ID() ?>Title')">
                        Buy now
                    </button>

                </section>
            </section>

            <!--Achterkant tickets -->

            <section class="buyTicket<?php echo $i ?>" id="buyTicket<?php echo $dance->getEvent_ID() ?>">
                <!--<section class="buyTicket<?php // echo $i ?>Title" id="BuyTicket<?php //echo $i ?>Title"><?php //echo $dance->getArtistName() ?></section> -->
                <section class="buyTicketLeftside" id="buyTicket1Leftside">
                    <label class="dayLabel">Date:<?php echo $dayFormat = date("d/m/y", strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="timeLabel">Time:<?php echo $timeFormat = date('H:i', strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="locationLabel">Location:<?php echo $dance->getLocation() ?></label>
                    <br>
                    <img class="imagesLeft" src="images/<?php echo $dance->getImage(); ?>.jpg">
                </section>
                <section class="buyTicketRightside" id="buyTicketRightside">
                    <form action="../Logic/ShoppingCartLogic.php" method="post" id="AddToCart<?php echo $dance->getEvent_ID() ?>">

                        <input style="display: none" class="valueArtist" name="artistID" type="text"
                               value="<?php echo $dance->getEvent_ID(); ?>"/>
                        <input style="display: none" class="valueAllAccessDay" name="allAccessDayID" type="text"
                               value="<?php echo $CombiEvents[0]->getEvent_ID(); ?>"/>
                        <input style="display: none" class="valueAllAccessWeekend" name="allAccessWeekendID" type="text"
                               value="<?php echo $CombiEvents[1]->getEvent_ID(); ?>"/>
                        <section class="ticketGridArea">

                            <label class="titleRegular">Regular ticket</label>
                            <label class="priceRegular">€<?php echo number_format((float)$dance->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountRegular">
                                <button class="minusRegular" id="minusRegular<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputRegular" type="number" value="0" name="amountArtist"
                                       id="inputRegular<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusRegular" id="plusRegular<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusRegular<?php echo $dance->getEvent_ID()?>', 'inputRegular<?php echo $dance->getEvent_ID()?>', 'plusRegular<?php echo $dance->getEvent_ID()?>')
                                </script>
                            </section>
                            <label class="titleAllAccessDay"><?php echo $CombiEvents[0]->getTicketName(); ?></label>
                            <label class="priceAllAccessDay">€<?php echo number_format((float)$CombiEvents[0]->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountAllAccessDay">
                                <button class="minusAllAccessDay"
                                        id="minusAllAccessDay<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputAllAccessday" name="amountAllAccessDay" type="number" value="0"
                                       id="inputAllAccessDay<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusAllAccessDay"
                                        id="plusAllAccessDay<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusAllAccessDay<?php echo $dance->getEvent_ID()?>', 'inputAllAccessDay<?php echo $dance->getEvent_ID()?>', 'plusAllAccessDay<?php echo $dance->getEvent_ID()?>')
                                </script>
                            </section>
                            <label class="titleAllAccessWeekend"><?php echo $CombiEvents[1]->getTicketName(); ?></label>
                            <label class="priceAllAccessWeekend">€<?php echo number_format((float)$CombiEvents[1]->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountAllAccessWeekend">
                                <button class="minusAllAccessWeekend"
                                        id="minusAllAccessWeekend<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputAllAccessWeekend" type="number" value="0" name="amountAllAccessWeekend"
                                       id="inputAllAccessWeekend<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusAllAccessWeekend"
                                        id="plusAllAccessWeekend<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusAllAccessWeekend<?php echo $dance->getEvent_ID()?>', 'inputAllAccessWeekend<?php echo $dance->getEvent_ID()?>', 'plusAllAccessWeekend<?php echo $dance->getEvent_ID()?>')
                                </script>

                            </section>
                            <button form="AddToCart<?php echo $dance->getEvent_ID(); ?>" type="submit"
                                    name="AddToShoppingCartMusic" value="submit"
                                    class="buttonAddTicket<?php echo $i ?>"
                                    id="AddToCartButton<?php echo $dance->getEvent_ID() ?>"> Add
                            </button>
                        </section>
                    </form>
                </section>


            </section>

            <?php $i++;
        } ?>
    </section>

    <!--tickets saturday -->

    <section class="grid-container ticketsSaturday" id="ticketsSaturday">
        <?php
        $DanceEvents = [];
        $danceLogic = new DanceLogic();
        $DanceEvents = (array)$danceLogic->GetAllDanceEvents("2018-07-28 00:00:00", "2018-07-29 00:00:00");
        //Fill array with the two combi events
        $CombiEvents = [];
        $combiLogic = new CombiLogic();
        $CombiEvents = (array)$combiLogic->GetAllCombiEventsByName("All-Access Saturday Dance", "All-Access Weekend Dance");

        $i = 1;
        ?>
        <?php
        foreach ($DanceEvents as $dance) {
            ?>
            <section name="ticket<?php echo $i ?>Title" class="ticket<?php echo $i ?>Title"
                     id="ticket<?php echo $dance->getEvent_ID() ?>Title"><?php echo $dance->getArtistName() ?></section>
            <section class="ticket<?php echo $i ?>Detail" id="ticket<?php echo $dance->getEvent_ID() ?>Detail">

                <section class="leftsideDetail">
                    <img class="imagesLeft" src="images/<?php echo $dance->getImage(); ?>.jpg">
                </section>
                <section class="rightsideDetail">
                    <label class="dayLabel ">Date:<?php echo $dayFormat = date("d/m/y", strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="timeLabel">Time:<?php echo $timeFormat = date('H:i', strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="locationLabel">Location:<?php echo $dance->getLocation() ?></label>
                    <br>
                    <label class="durationLabel">Duration:<?php echo $dance->getDuration() ?>min</label>
                    <br>
                    <label class="priceLabel">Price:€<?php echo number_format((float)$dance->getEvent()->getPrice(), 2, ',', ''); ?></label>
                    <br>
                    <br>

                    <button class="buyTicket<?php echo $i ?>Btn"
                            onclick="showBuyTicket('buyTicket<?php echo $dance->getEvent_ID() ?>', 'ticket<?php echo $dance->getEvent_ID() ?>Title')">
                        Buy now
                    </button>

                </section>
            </section>

            <!--Achterkant tickets -->

            <section class="buyTicket<?php echo $i ?>" id="buyTicket<?php echo $dance->getEvent_ID() ?>">
                <!--<section class="buyTicket<?php // echo $i ?>Title" id="BuyTicket<?php //echo $i ?>Title"><?php //echo $dance->getArtistName() ?></section> -->
                <section class="buyTicketLeftside" id="buyTicket1Leftside">
                    <label class="dayLabel">Date:<?php echo $dayFormat = date("d/m/y", strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="timeLabel">Time:<?php echo $timeFormat = date('H:i', strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="locationLabel">Location:<?php echo $dance->getLocation() ?></label>
                    <br>
                    <img class="imagesLeft" src="images/<?php echo $dance->getImage(); ?>.jpg">
                </section>
                <section class="buyTicketRightside" id="buyTicketRightside">
                    <form action="../Logic/ShoppingCartLogic.php" method="post" id="AddToCart<?php echo $dance->getEvent_ID() ?>">

                        <input style="display: none" class="valueArtist" name="artistID" type="text"
                               value="<?php echo $dance->getEvent_ID(); ?>"/>
                        <input style="display: none" class="valueAllAccessDay" name="allAccessDayID" type="text"
                               value="<?php echo $CombiEvents[0]->getEvent_ID(); ?>"/>
                        <input style="display: none" class="valueAllAccessWeekend" name="allAccessWeekendID" type="text"
                               value="<?php echo $CombiEvents[1]->getEvent_ID(); ?>"/>
                        <section class="ticketGridArea">

                            <label class="titleRegular">Regular ticket</label>
                            <label class="priceRegular">€<?php echo number_format((float)$dance->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountRegular">
                                <button class="minusRegular" id="minusRegular<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputRegular" type="number" value="0" name="amountArtist"
                                       id="inputRegular<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusRegular" id="plusRegular<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusRegular<?php echo $dance->getEvent_ID()?>', 'inputRegular<?php echo $dance->getEvent_ID()?>', 'plusRegular<?php echo $dance->getEvent_ID()?>')
                                </script>
                            </section>
                            <label class="titleAllAccessDay"><?php echo $CombiEvents[0]->getTicketName(); ?></label>
                            <label class="priceAllAccessDay">€<?php echo number_format((float)$CombiEvents[0]->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountAllAccessDay">
                                <button class="minusAllAccessDay"
                                        id="minusAllAccessDay<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputAllAccessday" name="amountAllAccessDay" type="number" value="0"
                                       id="inputAllAccessDay<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusAllAccessDay"
                                        id="plusAllAccessDay<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusAllAccessDay<?php echo $dance->getEvent_ID()?>', 'inputAllAccessDay<?php echo $dance->getEvent_ID()?>', 'plusAllAccessDay<?php echo $dance->getEvent_ID()?>')
                                </script>
                            </section>
                            <label class="titleAllAccessWeekend"><?php echo $CombiEvents[1]->getTicketName(); ?></label>
                            <label class="priceAllAccessWeekend">€<?php echo number_format((float)$CombiEvents[1]->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountAllAccessWeekend">
                                <button class="minusAllAccessWeekend"
                                        id="minusAllAccessWeekend<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputAllAccessWeekend" type="number" value="0" name="amountAllAccessWeekend"
                                       id="inputAllAccessWeekend<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusAllAccessWeekend"
                                        id="plusAllAccessWeekend<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusAllAccessWeekend<?php echo $dance->getEvent_ID()?>', 'inputAllAccessWeekend<?php echo $dance->getEvent_ID()?>', 'plusAllAccessWeekend<?php echo $dance->getEvent_ID()?>')
                                </script>

                            </section>
                            <button form="AddToCart<?php echo $dance->getEvent_ID(); ?>" type="submit"
                                    name="AddToShoppingCartMusic" value="submit"
                                    class="buttonAddTicket<?php echo $i ?>"
                                    id="AddToCartButton<?php echo $dance->getEvent_ID() ?>"> Add
                            </button>
                        </section>
                    </form>

                </section>


            </section>

            <?php $i++;
        } ?>
    </section>
    <section class="grid-container ticketsSunday" id="ticketsSunday">
        <?php
        $DanceEvents = [];
        $danceLogic = new DanceLogic();
        $DanceEvents = (array)$danceLogic->GetAllDanceEvents("2018-07-29 00:00:00", "2018-07-30 00:00:00");
        //Fill array with the two combi events
        $CombiEvents = [];
        $combiLogic = new CombiLogic();
        $CombiEvents = (array)$combiLogic->GetAllCombiEventsByName("All-Access Sunday Dance", "All-Access Weekend Dance");
        $i = 1;
        ?>
        <?php
        foreach ($DanceEvents as $dance) {
            ?>
            <section name="ticket<?php echo $i ?>Title" class="ticket<?php echo $i ?>Title"
                     id="ticket<?php echo $dance->getEvent_ID() ?>Title"><?php echo $dance->getArtistName() ?></section>
            <section class="ticket<?php echo $i ?>Detail" id="ticket<?php echo $dance->getEvent_ID() ?>Detail">

                <section class="leftsideDetail">
                    <img class="imagesLeft" src="images/<?php echo $dance->getImage(); ?>.jpg">
                </section>
                <section class="rightsideDetail">
                    <label class="dayLabel ">Date:<?php echo $dayFormat = date("d/m/y", strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="timeLabel">Time:<?php echo $timeFormat = date('H:i', strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="locationLabel">Location:<?php echo $dance->getLocation() ?></label>
                    <br>
                    <label class="durationLabel">Duration:<?php echo $dance->getDuration() ?>min</label>
                    <br>
                    <label class="priceLabel">Price:€<?php echo number_format((float)$dance->getEvent()->getPrice(), 2, ',', ''); ?></label>
                    <br>
                    <br>

                    <button class="buyTicket<?php echo $i ?>Btn"
                            onclick="showBuyTicket('buyTicket<?php echo $dance->getEvent_ID() ?>', 'ticket<?php echo $dance->getEvent_ID() ?>Title')">
                        Buy now
                    </button>

                </section>
            </section>

            <!--Achterkant tickets -->

            <section class="buyTicket<?php echo $i ?>" id="buyTicket<?php echo $dance->getEvent_ID() ?>">
                <!--<section class="buyTicket<?php // echo $i ?>Title" id="BuyTicket<?php //echo $i ?>Title"><?php //echo $dance->getArtistName() ?></section> -->
                <section class="buyTicketLeftside" id="buyTicket1Leftside">
                    <label class="dayLabel">Date:<?php echo $dayFormat = date("d/m/y", strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="timeLabel">Time:<?php echo $timeFormat = date('H:i', strtotime($dance->getEvent()->getStartTime())); ?></label>
                    <br>
                    <label class="locationLabel">Location:<?php echo $dance->getLocation() ?></label>
                    <br>
                    <img class="imagesLeft" src="images/<?php echo $dance->getImage(); ?>.jpg">
                </section>
                <section class="buyTicketRightside" id="buyTicketRightside">
                    <form action="../Logic/ShoppingCartLogic.php" method="post" id="AddToCart<?php echo $dance->getEvent_ID() ?>">

                        <input style="display: none" class="valueArtist" name="artistID" type="text"
                               value="<?php echo $dance->getEvent_ID(); ?>"/>
                        <input style="display: none" class="valueAllAccessDay" name="allAccessDayID" type="text"
                               value="<?php echo $CombiEvents[0]->getEvent_ID(); ?>"/>
                        <input style="display: none" class="valueAllAccessWeekend" name="allAccessWeekendID" type="text"
                               value="<?php echo $CombiEvents[1]->getEvent_ID(); ?>"/>
                        <section class="ticketGridArea">

                            <label class="titleRegular">Regular ticket</label>
                            <label class="priceRegular">€<?php echo number_format((float)$dance->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountRegular">
                                <button class="minusRegular" id="minusRegular<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputRegular" type="number" value="0" name="amountArtist"
                                       id="inputRegular<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusRegular" id="plusRegular<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusRegular<?php echo $dance->getEvent_ID()?>', 'inputRegular<?php echo $dance->getEvent_ID()?>', 'plusRegular<?php echo $dance->getEvent_ID()?>')
                                </script>
                            </section>
                            <label class="titleAllAccessDay"><?php echo $CombiEvents[0]->getTicketName(); ?></label>
                            <label class="priceAllAccessDay">€<?php echo number_format((float)$CombiEvents[0]->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountAllAccessDay">
                                <button class="minusAllAccessDay"
                                        id="minusAllAccessDay<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputAllAccessday" name="amountAllAccessDay" type="number" value="0"
                                       id="inputAllAccessDay<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusAllAccessDay"
                                        id="plusAllAccessDay<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusAllAccessDay<?php echo $dance->getEvent_ID()?>', 'inputAllAccessDay<?php echo $dance->getEvent_ID()?>', 'plusAllAccessDay<?php echo $dance->getEvent_ID()?>')
                                </script>
                            </section>
                            <label class="titleAllAccessWeekend"><?php echo $CombiEvents[1]->getTicketName(); ?></label>
                            <label class="priceAllAccessWeekend">€<?php echo number_format((float)$CombiEvents[1]->getEvent()->getPrice(), 2, ',', ''); ?></label>
                            <section class="amountAllAccessWeekend">
                                <button class="minusAllAccessWeekend"
                                        id="minusAllAccessWeekend<?php echo $dance->getEvent_ID() ?>">−
                                </button>
                                <input class="inputAllAccessWeekend" type="number" value="0" name="amountAllAccessWeekend"
                                       id="inputAllAccessWeekend<?php echo $dance->getEvent_ID() ?>"/>
                                <button class="plusAllAccessWeekend"
                                        id="plusAllAccessWeekend<?php echo $dance->getEvent_ID() ?>">+
                                </button>
                                <script>
                                    addTicket('minusAllAccessWeekend<?php echo $dance->getEvent_ID()?>', 'inputAllAccessWeekend<?php echo $dance->getEvent_ID()?>', 'plusAllAccessWeekend<?php echo $dance->getEvent_ID()?>')
                                </script>

                            </section>
                            <button form="AddToCart<?php echo $dance->getEvent_ID(); ?>" type="submit"
                                    name="AddToShoppingCartMusic" value="submit"
                                    class="buttonAddTicket<?php echo $i ?>"
                                    id="AddToCartButton<?php echo $dance->getEvent_ID() ?>"> Add
                            </button>
                        </section>
                    </form>

                </section>


            </section>

            <?php $i++;
        } ?>
    </section>

</section>
</body>
</html>