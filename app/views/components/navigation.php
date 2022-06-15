<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/navigation.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>

<body>
  <div class="VVVfixed-top">

    <a href="/">
      <img class="logo" src="/img/logo.png" alt="">
    </a>

    <nav>
      <div class="wrapper">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/food">Food</a></li>
          <li><a href="/dance">Dance</a></li>
          <li><a href="/shoppingcart">My cart</a><li>
          <li><a href="/">My program</a><li>

          <?php
          if (isset($_SESSION['user'])) {
            echo ('<li><a class= "loginposition" href="/user/logout">Logout</a></li>');
          }
          else {
            echo ('<li><a class= "loginposition" href="/user/loginview">Login</a></li>');
          }
          echo ('<li><img class="profile" src="..\img\defaultprofile.png" alt="profile" ></li>');
          ?>
          
        </ul>

      </div>
    </nav>
  </div>
</body>
</html>