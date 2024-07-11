<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Contact</title>
    <link rel="icon" type="image/x-icon" href="images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Contact | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Contact | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Contact | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Contact | Ceft Online">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- scripts -->
    <script src="./js/script.js"></script>

</head>
<body>

<?php include './layouts/navbar.php' ?>

<div class="container" id="home1">
    <div class="container-mid" style="height: 100%">
        <div class="grid-container">
            <div style="text-align: center">
                <h1>Contact</h1>
                <p>Ceft Online Banking</p>
            </div>
        </div>
    </div>
</div>

<div class="container" id="home2">
    <div class="container-mid" style="width: 100%">
        <div class="grid-container">
            <div class="home-card">Reach out</div>
        </div>
    </div>
</div>

<div class="contact-form" id="home3" style="margin-bottom: 80px;">
    <div class="container-mid">
        <form action="./backend/public/contact_email.php" method="post">
            <input class="dark-bg-input" id="fname" type="text" required placeholder="First Name"><br>
            <input class="dark-bg-input" id="lname" type="text" required placeholder="Last Name"><br>
            <input class="dark-bg-input" id="tel" type="text" required placeholder="Telephone"><br>
            <input class="dark-bg-input" id="email" type="email" required placeholder="Email"><br>
            <textarea class="dark-bg-input" id="message" required placeholder="Message"></textarea><br>
            <button class="dark-bg-button" style="margin-top: 20px; width: 160px;" type="submit">Send</button>
        </form>
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
</script>

</body>
</html>