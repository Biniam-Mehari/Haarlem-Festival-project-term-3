<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/navigation.css">
  <title>Document</title>
</head>

<body>
  <div class="festival-navigation">
    <div class="navbar">
      <a href="home">
        <img src="../img/HFLogo.png" class="logo">
      </a>
      <ul>
        <li><a href="home">Home</a></li>
        <li><a href="../view/foodmain.php" class="active">Food</a></li>
        <li><a href="about">Dance</a></li>
        <li><a href="signup">History</a></li>
        <li><a href="signup">Signup</a></li>
        <?php if (isset($_SESSION['user'])) {
          echo '<li><a href="logout">Logout</a></li>';
        } else {
          echo '<li><a href="login">Login</a></li>';
        } ?>
      </ul>
    </div>
  </div>
</body>

</html>