<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style1.css">
 
    <title>LoginPage</title>
</head>
<body>

<a href="home">
        <img class="logo" src="./img/logo.png" alt="" >
        </a>
    <nav>  
    <div class="wrapper">
      <ul>
        <li><a href="home">Home</a></li>
        <li><a href="BookView">Books</a></li>
        <li><a href="contact">Contact</a></li>
        <li><a href="signup">Become a member</a></li>
       
       <?php 
         echo('<li><a class= "loginposition" href="login">LogIn</a></li>'); //<li><a class= "loginposition" href="login">LogIn</a></li>
         echo('<li><img class="profile" src="img/default.profile.png" alt="profile" ></li>');// <img class="logo" src="img/default.profile.png" alt="profile" >
       ?>
      
      </ul>
      
<div class="login-wrap">
	<div class="login-html">
	<form name="sign-up.html" method="post" action="login">
	<h1>Sign up</h1>
    <br></br>
		<div class="login-form">
				<div class="group">
					<label for="user" class="label">firstname</label>
					<input type="text" name="firstName" id="firstName" required="_required"/>
				</div>
				<div class="group">
					<label for="pass" class="label">Lastname</label>
					<input type="text" name="lastName" id="lastName" required="_required"/>
				</div>
				<div class="group">
					<label for="pass" class="label">Email</label>
                    <input type="text" name="email" id="email" required="_required"/>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
                    <input type="text" name="password" id="password" required="_required"/>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="login">Already Member?</a>
				</div>
</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>

