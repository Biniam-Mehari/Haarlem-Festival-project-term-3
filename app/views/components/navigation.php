<?php
//session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navigation</title>
    <link rel="stylesheet" href="/css/navigation.css">
</head>

<body>
    <div class="festival-navigation">
        <div class="navbar">
            <a href="home">
                <img src="/img/HFlogo.png" class="logo">
            </a>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/food">Food</a></li>
                <li><a href="/dance">Dance</a></li>
                <li><a href="signup">History</a></li>
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