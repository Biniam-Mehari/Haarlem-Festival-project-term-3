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
    <link rel="stylesheet" href="/css/foodmain.css">
    <title>Signup</title>
</head>


<body>
    <section class="container mt-5 p-5 col-10 col-md-6 col-lg-4 col-xl-5" style="background-color: white;">
        <div class="container">
            <section id="error-message-signup" style="margin-top: 10px;"></section>
            <label class="h3 mb-3 fw-normal ">Please sign up</label>
            <form action="/user/signup" method="POST" id="signup-form">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="Enter firstname" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Enter lastname" required>
                        </div>
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="passowrd">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="telephoneNumber">Telephone number</label>
                    <input type="tel" class="form-control" name="telephoneNumber" placeholder="Enter telephone number" required>
                </div>
                <div class="g-recaptcha brochure__form__captcha mt-3"  data-sitekey="6LfpmhsfAAAAAFTVFM2Nv3_OYe-8Jr8pGsaVPQGI"></div>
                <button type="submit" name="submit" class="btn btn-primary mt-3 col-12 mt-3" id="signup-button">Sign up</button>

                <div class="text-center mt-3">
                    <p>Already have an account? <a href="/user/loginview">Sign in</a></p>
                </div>
            </form>
            </div>
    </section>
    <script src="/js/signup.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>