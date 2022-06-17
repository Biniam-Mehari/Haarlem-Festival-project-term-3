<?php
require_once __DIR__ . '/../components/navigation.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/dancereservation.css">
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



  <div class="container-sm">
    <div class="row">
      <div class="col-8">
        <h2 class="display-title">Venue: <?php echo $event->Venue->getVenueName() ?></h2>
        <h4 class=""><?php echo $event->Venue->getDescription() ?></h4>
        <img class="restaurant-image" src="/img/Afrojack.jpg">
        <br>
        <h1 class="information"> General information</h1>
        <h3 class="information">Location: <?php echo $event->Venue->getAdress()  . " " . $event->Venue->getHousenumber() . ", " . $event->Venue->getPostcode() . ", " . $event->Venue->getCity() ?></h3>
        <h3 class="information">Price: &euro;<?php echo $event->getPrice() ?></h3>
        <h3 class="information">Date <?php echo $event->getDate() . " " . $event->getStartTime() ?></h3>
        <h2 class = "information">Artist: <?php echo $event->Artist->getArtistName() ?></h2>
        <h3 class="information">Session: <?php echo $event->getSession() ?></h3>
        <br>

      </div>



      <div class="col-4">
        <h2 class="display-title">Artist: <?php echo $event->Artist->getArtistName() ?></h2>
        <h4 class=""><?php echo $event->Artist->getDescription() ?></h4>
        <img class="restaurant-image" src="/img/Afrojack.jpg">
        <br>
        <label class="information">Style: <?php echo $event->Artist->getStyle() ?></label>
        <br>
        <label class= "information">Social media: </label>
        <br>   
          <br>
          <a href=<?php echo $event->Artist->getFacebook() ?>>
            <img class="socialMediaIcons" src="/img/socialMediaIcons/faceBook.png">
          </a>
          <a href=<?php echo $event->Artist->getTicTok() ?>>
            <img class="socialMediaIcons" src="/img/socialMediaIcons/tikTok.png">
          </a>
          <a href=<?php echo $event->Artist->getInstagram() ?>>
            <img class="socialMediaIcons" src="/img/socialMediaIcons/instaGram.png">
          </a>
          <a href=<?php echo $event->Artist->getYouTube() ?>>
            <img class="socialMediaIcons" src="/img/socialMediaIcons/youTube.png">
          </a>
          <br>
          <br>
   

          <form class="w3-section w3-container" action="/shoppingcart/addToCart" method="post" id="form">
          <input name="danceID" value="<?php echo $danceID ?>" hidden>
          <input name="venueName" value="<?php echo $event->Venue->getVenueName() ?>" hidden>
          <input name="date" value="<?php echo $event->getDate() ?>" hidden>
          <input name="artistName" value="<?php echo $event->Artist->getArtistName() ?>" hidden>
          <input name="startTime" value="<?php echo $event->getStartTime() ?>" hidden>
          <input name="venueAdress" value="<?php echo $event->Venue->getAdress()?>" hidden>
          <input name="price" value="<?php echo $event->getPrice() ?>" hidden>
          
          <label style="font-size: 18px;">Number of tickets:</label>
            <input class="w3-input" type="number" style="width:30%;" name="amount" id="tickets" placeholder="Enter number of tickets..." required>
            <br>
          <button name="danceReservation" type="submit" class="btn btn-success">Book a ticket</button>
          </form>

      </div>

   
    </div>
  </div>
</body>

</html>