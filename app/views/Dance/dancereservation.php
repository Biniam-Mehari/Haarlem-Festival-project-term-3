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
  <link rel="stylesheet" href="/css/foodmain.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

  <title>Food</title>
</head>

<body>
  <section class="food-banner">
    <img class="food-banner-image" src="/img/dancePage.png">
    <h1 class="food-title">Dance</h1>
    <!-- <p class="food-description">Taste some of the most exquisite cuisines that the Haarlem Festival has to offer!</p> -->
  </section>



  <div class="container-sm">
    <div class="row">
      <div class="col-6">
        <h2 class="display-title"><?php echo $event->Venue->getVenueName() ?></h2>
        <h4 class=""><?php echo $event->Venue->getDescription() ?></h4>
        <img class="restaurant-image" src="/img/Afrojack.jpg">
        <br>
        <label> General information</label>
        <h3 class="restaurant-address">Location: <?php echo $event->Venue->getAdress()  . " " . $event->Venue->getHousenumber() . ", " . $event->Venue->getPostcode() . ", " . $event->Venue->getCity() ?></h3>
        <strong class="restaurant-price">Price: &euro;<?php echo $event->getPrice() ?></strong>
        <h3 class="restaurant-seats">Date <?php echo $event->getDate() . " " . $event->getStartTime() ?></h3>
        <h2 class>Artist: <?php echo $event->Artist->getArtistName() ?></h2>
        <h3 class="restaurant-seats">Session: <?php echo $event->getSession() ?></h3>
        <br>

      </div>



      <div class="col-6">
        <h2 class="display-title"><?php echo $event->Artist->getArtistName() ?></h2>
        <h4 class=""><?php echo $event->Artist->getDescription() ?></h4>
        <img class="restaurant-image" src="/img/Afrojack.jpg">
        <br>
        <label class=>Style: <?php echo $event->Artist->getStyle() ?></label>
        <br>
        <labe>Social media</label>
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
          <br>

          <div class="btn-group" role="group" aria-label="...">
            <button font-size="100px" onclick="clicked(-1)">-</button>
            <input id="test" value="1"></input>
            <button onclick="clicked(1)">+</button>

          </div>
          <br>
          <br>
          <button type="button" class="btn btn-success">Book a ticket</button>

      </div>

      <script type="text/javascript">
        var i = 1;

        function clicked(n) {
          //var test = document.getElementById("test");
          const number = document.getElementById("test").value;
          if (number >= 1) {
            i = i + n;
            document.getElementById("test").value = i;
          }

        };
      </script>




    </div>
  </div>


</body>

</html>