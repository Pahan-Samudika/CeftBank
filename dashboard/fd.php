<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Fixed Deposit Request</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Fixed DepFixed Deposit Request | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Fixed Deposit Request | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Fixed Deposit Request | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Fixed Deposit Request | Ceft Online">
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
        <a href="./fd.php">Investments</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Request Fixed Deposit</h1>
                    <!--<p style="margin: 0;">--</p>-->

                    <form action="../backend/user/fd/create.php" method="post">

                        <input class="login-input" type="text" name="name" id="name"
                               placeholder="Customer Name"><br><br>

                        <input class="login-input" type="number" name="amount" id="amount" placeholder="Amount"><br><br>

                        <label for="TandD" class="form-label">Type and Duration:</label>
                        <select class="login-input" name="TandD" id="TandD" style="height: inherit;">
                            <option value="">Select one</option>
                            <option value="Fixed Deposit - Interest paid Maturity">Fixed Deposit - Interest paid Maturity</option>
                            <option value="Fixed Deposit - Interest paid monthly">Fixed Deposit - Interest paid monthly</option>
                            <option value="Fixed Deposit - Interest paid annually">Fixed Deposit - Interest paid annually</option>
                            <option value="Fixed Deposit - 100,300 Days">Fixed Deposit - 100,300 Days</option>
                        </select><br><br>

                        <label for="MaturityInstructions" class="form-label">Maturity Instructions:</label>
                        <select class="login-input" name="MaturityInstructions" id="MaturityInstructions" style="height: inherit;">
                            <option value="">Select one</option>
                            <option value="Credit maturity proceeds to account number">Credit maturity proceeds to account number</option>
                            <option value="Re-invest with accrued">Re-invest with accrued</option>
                            <option value="Re-invest without accrued interest">Re-invest without accrued interest</option>
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