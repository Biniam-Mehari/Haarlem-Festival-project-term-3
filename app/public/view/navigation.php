<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style1.css">
    <title>Document</title>
</head>
<body>
    
     <a href="home">
        <img class="logo" src="./img/logo.png" alt="" >
        </a>
    <nav>  
    <div class="wrapper">
      <ul>
        <li><a href="home">Home</a></li>
        <li><a href="dance">Dance</a></li>
        <li><a href="food">Food</a></li>
        <li><a href="history">History</a></li>
       
       <?php 
         echo('<li><a class= "loginposition" href="login">LogIn</a></li>'); //<li><a class= "loginposition" href="login">LogIn</a></li>
         echo('<li><img class="profile" src="img/default.profile.png" alt="profile" ></li>');// <img class="logo" src="img/default.profile.png" alt="profile" >
       ?>
      
     
       
      </ul>
  
    </div>
  </nav>
</body>
</html>