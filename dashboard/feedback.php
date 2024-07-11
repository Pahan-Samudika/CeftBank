<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Feedback</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Feedback | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Feedback | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Feedback | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Feedback | Ceft Online">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/feedback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- scripts -->
    <script src="../js/script.js"></script>

</head>
<body class="dashboard-body">

<?php include './layouts/navbar.php' ?>
<?php include './layouts/dashboard_secondary_nav.php' ?>

<div class="dashboard-board" style="min-height: calc(100vh - 220px)">

    <div class="container breadcrumb">
        <a href="./">Dashboard</a>
        <span>></span>
        <a href="./feedback.php">Feedback</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Feedback</h1>
                    <!--<p style="margin: 0;">--</p>-->

                    <form action="../backend/user/feedback/create.php" method="post">

                        <div class="star-widget">
                            <span class="form-label">How do you rate our service</span>

                            <input style="display: none" type="radio" value="5" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>

                            <input style="display: none" type="radio" value="4" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>

                            <input style="display: none" type="radio" value="3" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>

                            <input style="display: none" type="radio" value="2" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>

                            <input style="display: none" type="radio" value="1" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                            <br>
                            <textarea name="msg" style="margin-top: 40px;" class="login-input" cols="30"
                                      placeholder="Did you find what you wre looking for? Any ideas for improvement?"></textarea>
                            <br>
                            <button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <p class="legal-footer" style="background-color: transparent; color: #707070; padding: 20px 0 30px;">
        ©<span id="year"></span> Ceft Online. All rights reserved.
    </p>

</div>

<script>
    // alert box
    alertBox("Feedback sent successfully", "Feedback sending failed");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>