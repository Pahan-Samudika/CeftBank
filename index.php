<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Ceft Online</title>
    <link rel="icon" type="image/x-icon" href="images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Ceft Online">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/slideshow.css">

    <!-- scripts -->
    <script src="./js/script.js"></script>
    <script src="./js/slideshow.js"></script>

</head>
<body>

<?php include './layouts/navbar.php' ?>

<div class="container" id="home1">
    <div class="container-mid" style="height: 100%">
        <div class="grid-container">
            <div>
                <img src="images/logos/ceft_logo_black.png" alt="Ceft Bank Logo" width="200" height="auto">
            </div>
            <div style="text-align: left">
                <h1>Ceft Online</h1>
                <p>Online Banking Platform</p>
            </div>
        </div>
    </div>
</div>

<div class="container" id="home2">
    <div class="container-mid" style="width: 100%">
        <div class="grid-container">
            <div class="home-card">Savings</div>
            <div class="home-card">Deposits</div>
            <div class="home-card">Business</div>
            <div class="home-card">Cards</div>
            <div class="home-card">Loans</div>
        </div>
    </div>
</div>

<div class="" id="home3">
    <div class="grid-container">
        <div>
            <!-- Slideshow container -->
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <img src="./images/slide-show/img1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="./images/slide-show/img2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="./images/slide-show/img3.jpg" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
        <div class="container-mid">
            <h1>Ceft Online</h1>
            <p class="home3-text">Welcome to CEFT Online Banking Platform, your secure and convenient solution for
                managing your finances. With our user-friendly interface and advanced features, we make it easier than
                ever to access and control your accounts anytime, anywhere. Whether you want to check your balance,
                transfer funds, pay bills, or set up automatic payments, CEFT Online Banking Platform has got you
                covered. Our cutting-edge security measures ensure that your personal and financial information is
                protected, giving you peace of mind while you take care of your banking needs. Experience the power of
                modern banking with CEFT Online Banking Platform and enjoy seamless financial management at your
                fingertips.
            </p>
        </div>
    </div>
</div>

<div id="home4">
    <div class="container-mid" style="width: 100%">
        <h1>Other Services</h1>
        <div class="grid-container">
            <div class="home-card">
                <img alt="cards" src="./images/home/home-1.jpg">
                <p>Debit/Credit Cards</p>
            </div>
            <div class="home-card">
                <img alt="cards" src="./images/home/home-2.jpg">
                <p>Cheque Books</p>
            </div>
            <div class="home-card">
                <img alt="cards" src="./images/home/home-3.jpg">
                <p>Financial Guidance</p>
            </div>
        </div>
    </div>
</div>

<div id="home5">
    <div class="container-mid" style="width: 100%">
        <h1 style="color: #fff;">Stay connected</h1>
        <div class="grid-container">
            <div class="home-card">Rate</div>
            <div class="home-card">Visit</div>
            <div class="home-card">Contact</div>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container-mid" style="width: 100%">
        <div class="grid-container footer-container">
            <div class="footer-card">
                <div>
                    <img src="./images/logos/ceft_full_white.png" alt="Ceft Bank Logo" width="80" height="auto">
                </div>
                <div>
                    <p>
                        CEFT Online Banking Platform is committed to providing you with secure and efficient online
                        banking services. Our platform is designed to ensure the privacy and security of your personal
                        and financial information.
                    </p>
                </div>
                <div>
                    <a class="dark-bg-link footer-links" href="#">Terms & Conditions</a>
                    <span> | </span>
                    <a class="dark-bg-link footer-links" href="#">Privacy Policy</a>
                </div>
            </div>
            <div class="footer-card">
                <div class="grid-container">
                    <div class="links-list">
                        <b>Contact us</b>
                        <hr/>
                        <ul>
                            <li>
                                Phone: <a class="dark-bg-link" href="tel:+94111231234">+94 11 123 1234</a>
                            </li>
                            <li>
                                Email: <a class="dark-bg-link" href="mailto:info@ceft.online">info@ceft.online</a>
                            </li>
                    </div>
                    <div class="links-list">
                        <b>Quick Links</b>
                        <hr/>
                        <ul>
                            <li>
                                <a class="dark-bg-link" href="./">Home</a>
                            </li>
                            <li>
                                <a class="dark-bg-link" href="./about.php">About</a>
                            </li>
                            <li>
                                <a class="dark-bg-link" href="./contact.php">Contact</a>
                            </li>
                            <li>
                                <a class="dark-bg-link" href="./login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<p class="legal-footer">
    ©<span id="year"></span> Ceft Online. All rights reserved.
</p>

<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
    window.onload = function () {
        currentSlide(1);
    };
</script>

</body>
</html>