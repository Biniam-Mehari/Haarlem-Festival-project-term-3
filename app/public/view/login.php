<?php
require_once 'navigation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
</head>

<div class="login-wrap">
	<div class="login-html">
	<form name="sign-in.html" method="post" action="signup">
	<h1>Sign in</h1>
	<br></br>
		<div class="login-form">
				<div class="group">
					<label for="email" class="label">Email</label>
					<input type="text" name="email" id="email" required="_required"/>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input type="text" name="password" id="password" required="_required"/>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
				<a href="signup">  Make a new account or </a>
					<a href="#forgot">forgot Password?</a>
				</div>
</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
