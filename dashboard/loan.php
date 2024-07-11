<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Loan Request</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Loan Request | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Loan Request | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Loan Request | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Loan Request | Ceft Online">
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

<div class="dashboard-board">

    <div class="container breadcrumb">
        <a href="./">Dashboard</a>
        <span>></span>
        <a href="./loan.php">Loans</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Request Loan</h1>
                    <!--<p style="margin: 0;">--</p>-->

                    <form action="../backend/user/loan/create.php" method="post">
                        <label for="lType" class="form-label">Loan Type :</label>
                        <select class="login-input" name="lType" id="lType" style="height: inherit;">
                            <option value="">Please Select</option>
                            <option value="Personal Loan">Personal Loan</option>
                            <option value="Home Loans">Home Loans</option>
                            <option value="Business Loan">Business Loan</option>
                            <option value="Education Loan">Education Loan</option>
                            <option value="Construction Loan">Construction Loan</option>
                        </select><br><br>

                        <fieldset id="fs1" style="margin-top: 20px;">

                            <legend>Loan Application Type</legend>
                            <label for="lAppType" class="form-label">Application Type:</label>
                            <select class="login-input" name="lAppType" id="lAppType" style="height: inherit;">
                                <option value="">Please Select</option>
                                <option value="Single">Single</option>
                                <option value="Joint">Joint</option>
                            </select><br><br>

                        </fieldset>

                        <fieldset id="fs2" style="margin-top: 50px;">
                            <legend> Personal Information</legend>
                            <input class="login-input" type="text" name="cName" id="cName"
                                   placeholder="Customer Name"><br><br>

                            <label for="ReWithCeft" class="form-label">Relationship with Ceft Online Bank:</label>
                            <select class="login-input" name="ReWithCeft" id="ReWithCeft" style="height: inherit;">
                                <option value="">Please Select</option>
                                <option value="Existing Customer without borrowings">Existing Customer without borrowings</option>
                                <option value="Existing Customer with borrowings">Existing Customer with borrowings</option>
                            </select><br><br>

                        </fieldset>
                        <button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Submit
                        </button>

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