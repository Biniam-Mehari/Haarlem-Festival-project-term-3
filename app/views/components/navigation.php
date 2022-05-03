<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/navigation.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  <title>Document</title>
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


          <?php
          echo ('<li><a class= "loginposition" href="login">LogIn</a></li>'); //<li><a class= "loginposition" href="login">LogIn</a></li>
          echo ('<li><img class="profile" src="..\img\defaultprofile.png" alt="profile" ></li>'); // <img class="logo" src="img/default.profile.png" alt="profile" >
          ?>
          
        </ul>

      </div>
    </nav>
  </div>
</body>

</html>