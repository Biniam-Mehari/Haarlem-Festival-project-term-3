<?php
require_once 'navigation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="../css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
</head>

<div class="login-wrap">
	<div class="login-html">
	<form name="sign-in.html" method="post" action="signup">
	<h1>Password forgotten?</h1>
	<br></br>
		<div class="login-form">
				<div class="group">
					<label for="email" class="label">Email</label>
					<input type="text" name="email" id="email" required="_required"/>
				</div>
				<div class="group">
					<label for="username" class="label">username</label>
					<input type="text" name="username" id="username" required="_required"/>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Send email">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
				<a href="login">Return to Login</a>
				</div>
</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
