<?php

session_start();

if (isset($_SESSION['uid'])) {
    $role = $_SESSION['role'];
    if ($role == 'admin') {
        header('Location: ./admin/user.php');
        exit();
    } else if ($role == 'manager') {
        header('Location: ./admin/user.php');
        exit();
    } else if ($role == 'security') {
        header('Location: ./admin/security.php');
        exit();
    } else if ($role == 'cashier') {
        header('Location: ./admin/new_user.php');
        exit();
    } else {
        header('Location: ./dashboard');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Login | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Login | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Login | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Login | Ceft Online">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- scripts -->
    <script src="./js/script.js"></script>

</head>
<body>

<?php include_once './layouts/navbar.php' ?>

<div class="login-container container-mid">
    <div class="contact-form" id="login1">

        <div class="login-grid-container">
            <form action="./backend/public/login.php" method="post">
                <div class="login-main-side container-mid login-grid-1">
                    <p style="margin: 0;">Ceft Online Banking</p>
                    <h1 style="margin: 10px 0 30px;">Login</h1>
                    <input class="login-input" name="username" id="username" required type="text" placeholder="Username">
                    <input class="login-input" name="password" id="password" required type="password" placeholder="Password">
                    <div style="padding-left: 200px">
                        <a class="login-forgot-link" href="./forgot.php">Forgot password?</a>
                    </div>
                    <button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Login</button>
                </div>
            </form>
            <div>
                <div class="login-side"></div>
                <div class="login-grid-container login-grid-2" style="height: 90px">
                    <div class="container-mid">
                        <div class="login-support-text">
                            <p style="margin: 0 0 5px; font-size: 14px; font-weight: bold;">Support</p>
                            <span>Tel: </span><a class="light-bg-link" href="tel:+94711427657">+94 71 142 7657</a>
                            <br>
                            <span>Email: </span><a class="light-bg-link"
                                                   href="mailto:info@ceft.online">info@ceft.online</a>
                        </div>
                    </div>
                    <div class="container-mid">
                        <img alt="Ceft Logo" src="./images/logos/ceft_logo_black.png" style="width: 80px">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<p class="legal-footer" style="background-color: #fff; color: #000;">
    ©<span id="year"></span> Ceft Online. All rights reserved.
</p>

<script>
    // alert box
    alertBox("Logout successfully", "Invalid Credentials");
    resetPasswordAlert("Password reset successful!", "");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>