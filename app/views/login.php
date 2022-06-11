<?php
require_once __DIR__ . '/components/navigation.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/foodmain.css">
    <title>Login</title>
</head>

<body>
    <section class="container mt-5 p-5 col-10 col-md-6 col-lg-4 col-xl-3" style="background-color: white;">
        <div class="container mt-3">
            <label class="h3 mb-3 fw-normal ">Please sign in</label>
            <form action="/user/login" method="post" id="login-form">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" name="email" class="form-control" required/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Password</label>
                    <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfpmhsfAAAAAFTVFM2Nv3_OYe-8Jr8pGsaVPQGI" id="re-captcha"></div>
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 col-12 mt-3" id="login-button">Sign in</button>
                <div class="text-center">
                    <p>Not a member? <a href="/user/signupview">Register</a></p>
                </div>
            </form>
            <section id="error-message-login" style="margin-top: 10px;"></section> 
        </div>
    </section>
    <script src="../js/login.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>