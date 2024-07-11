<?php

session_start();

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else {
    $role = "";
}



if (isset($_SESSION['uid'])) {
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

    <title>Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Forgot Password | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Forgot Password | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Forgot Password | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Forgot Password | Ceft Online">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- scripts -->
    <script src="./js/script.js"></script>

</head>
<body>

<?php include './layouts/navbar.php' ?>

<div class="login-container container-mid">
    <div class="contact-form" id="login1">

        <div class="">
            <div class="login-main-side container-mid login-grid-1">
                <form action="./backend/public/send_verification.php" method="post">
                    <p style="margin: 0;">Ceft Online Banking</p>
                    <h1 style="margin: 10px 0 30px;">Forgotten Password</h1>
                    <input class="login-input" id="email" name="email" type="email" required placeholder="Email"><br>
                    <button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Send
                        Verification
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

<p class="legal-footer" style="background-color: #fff; color: #000;">
    ©<span id="year"></span> Ceft Online. All rights reserved.
</p>

<script>
    // alert box
    alertBox("Verification sent successfully!", "Verification sending failed!");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>