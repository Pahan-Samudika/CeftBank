<?php

session_start();
$uid = $_SESSION['uid'];

include_once('../backend/connection.php');

$query = "SELECT * FROM alert WHERE to_user IS NULL OR (to_user = '$uid' AND alert_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY))  ORDER BY alert_date DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Alerts</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Alerts | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Alerts | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Alerts | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Alerts | Ceft Online">
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

<div class="dashboard-board" style="min-height: calc(100vh - 223px)">

    <div class="container breadcrumb">
        <a href="./">Dashboard</a>
        <span>></span>
        <a href="./alerts.php">Alerts</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="login-main-side container-mid login-grid-1" style="padding: 20px 30px;">
                <h1 style="margin: 10px 0;">Alerts</h1>
                <table>

                    <?php
                    if (mysqli_num_rows($result) > 0) {

                        echo
                        '<tr>
                            <th>Date</th>
                            <th>Message</th>
                        </tr>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                                '<tr>
                                    <td>' . $row['alert_date'] . '</td>
                                    <td>' . $row['alert'] . '</td>
                                </tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    
                    ?>

                </table>

            </div>
        </div>
    </div>

    <p class="legal-footer" style="background-color: transparent; color: #707070; padding: 20px 0 30px;">
        ©<span id="year"></span> Ceft Online. All rights reserved.
    </p>

</div>

<script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>