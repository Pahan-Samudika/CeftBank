<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Chequebook Request</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Chequebook Request | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Chequebook Request | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Chequebook Request | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Chequebook Request | Ceft Online">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="../css/style.css">

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
        <a href="./chequebook.php">Request Chequebooks</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Request Chequebook</h1>
                    <!--<p style="margin: 0;">--</p>-->

                    <form action="../backend/user/chequebook/create.php" method="post">

                        <input class="login-input" type="text" id="NBook" placeholder="Number of Books" name="NBook"><br><br>
                        <input class="login-input" type="text" id="CNUmber" name="CNUmber" placeholder="Contact Number"><br><br>
                        <label for="Rbranch" class="form-label">Receive From : </label>
                        <select class="login-input" name ="Rbranch" id="Rbranch" style="height: inherit;">
                            <option value="">Select branch</option>
                            <option value="Branch 1">Branch 1</option>
                            <option value="Branch 2">Branch 2</option>
                            <option value="Branch 3">Branch 3</option>
                            <option value="Branch 4">Branch 4</option>
                            <option value="Branch 5">Branch 5</option>
                        </select><br><br>

                        <button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Submit</button>
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
    alertBox("Request sent successfully", "Request sending failed");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>