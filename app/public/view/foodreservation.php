<?php
require_once 'navigation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/foodinformation.css">
    <title>Food Information</title>

</head>
<body>

<!-- breadcrumbs -->
<div class="breadcrumb-navigation">
    <ul>
        <li><a href="home">Home</a></li>
        <li><a href="foodmain">Food</a></li>
        <li>Ratatouille</li>
    </ul>
</div>

<div class="banner">
    <div class="banner-content">
        <img src="img/bannerRatatouille.jpg" alt="bannerRatatouille">
        <h1>Ratatouille<h1>
    </div>
</div>


<div class="information-content">
    <div class="content-leftside">
        <div class="restaurant-title">
            <h1>Ratatouille</h1>
            <h2> 4.0/5.0<h2>
        </div>

        <div class="about-restaurant">
            <h1>About the restaurant</h1>
            <p>
                The successful Michelin restaurant in Haarlem of chef Jozua Jaring is – just like
                <br>
                Ratatouille – a mix of French cuisine in today's reality with excellent value for money in
                <br>
                an accessible environment in Haarlem. For example, in 2013 we started our restaurant
                <br>
                in Haarlem in the Lange Veerstraat and after the move in 2015 we will also continue at
                <br>
                our unique monumental location at Het Spaarne with our restaurant in Haarlem.
            </p>
        </div>

        <div class="video">
            <video width="612" height="344" controls  muted>
                <source src="video/ratatouille.mp4" type="video/mp4">
                <source src="video/ratatouille.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="booking-table">
            <h1>Booking a table</h1>
            <p>
            If you wish to book a table at the Ratatouille
            <br> 
            restaurant, proceed by clicking the button 
            <br>
            below. You can also add the booking to your
            <br>
            wishlist if you wish to do it at a later timestamp.
            </p>
            <div class="buttons">
            <a href="#"><button class="btn-book">Book a table</button></a>
            <a href="#"><button class="btn-wishlist">Add to wishlist</button></a>
            </div>
        </div>
    </div>

    <div class="content-rightside">
        <div class="restaurant-picture">
            <img class="restaurant-pic"src="img/pictureRatatouille.jpg" alt="pictureRatatouille">
        </div>

        <div class="general-information">
            <h1>General information</h1>
            <p>
            Venue: Ratatouille
            <br> 
            Location: Spaarne 96, 2011 CL Haarlem, Nederland 
            <br>
            Date: 27 July - 31 July
            <br>
            First session start time: 17:00
            <br>
            Duration of session: 120 minutes 
            <br>
            Sessions: 3
            <br>
            Number of seats: 52
            <br>
            Type of food: French, Fish and Seafood, European
            <br>
            Price per adult: €45,00
            <br>
            Price per child: €22,50
            <br>
            Restaurant rating: 4 stars
            <br>
            Accessibility: Wheelchair not accessible 
            </p>
        </div>

        <div class="contact-information">
            <h1>Contact information</h1>
            <p>
            Phone number: 023 542 7270
            <br> 
            Email: info@ratatouillefoodandwine.nl 
            <br>
            KvK: 58174923
            <br>
            First session start time: 17:00
            <br>
            Duration of session: 120 minutes 
            <br>
            Sessions: 3
            <br>
            Number of seats: 52
            <br>
            Type of food: French, Fish and Seafood, European
            <br>
            Price per adult: €45,00
            <br>
            Price per child: €22,50
            <br>
            Restaurant rating: 4 stars
            <br>
            Accessibility: Wheelchair not accessible 
            </p>
        </div>
    </div>
</div>

</body>
</html>