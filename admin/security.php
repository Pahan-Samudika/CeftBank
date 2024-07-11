<?php

session_start();
$role = $_SESSION['role'];

if ($role != 'admin' && $role != 'security') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

include_once('../backend/connection.php');

$query1 = "SELECT * FROM cyber_security ORDER BY id DESC";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);
$current_status = $row1['status'];

$query2 = "SELECT * FROM cyber_security ORDER BY id DESC";
$result2 = mysqli_query($conn, $query2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Admin | Cyber Security Panel</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Admin | Cyber Security Panel">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Admin | Cyber Security Panel">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Admin | Cyber Security Panel">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Admin | Cyber Security Panel">
    <meta property="twitter:description" content="Ceft Online platform enables your online financial needs">
    <meta property="twitter:image" content="https://www.ceft.online/images/og.png">

    <!-- styles -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- scripts -->
    <script src="../js/script.js"></script>

</head>
<body class="dashboard-body">

<?php include './layouts/navbar.php' ?>
<?php include './layouts/admin_secondary_nav.php' ?>


<div class="dashboard-board" style="min-height: calc(100vh - 227px);">

    <div class="container breadcrumb">
        <a href="./security.php">Cyber Security</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1" style="width: 90%">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Cyber Security Panel</h1>

                    <?php
                    if ($current_status == 1) {
                        echo '<p style="font-weight: bold; color: green;">
                        System is up and live, all the functions are allowed.
                    </p>';
                    } else {
                        echo '<p style="font-weight: bold; color: red;">
                        System is closed, only cyber security officers can access.
                    </p>';
                    }
                    ?>

                    <button onclick="shutdownSystem(<?php echo $current_status ?>)" class="dark-bg-button"
                            style="margin: 30px 0; width: 160px;"
                            type="submit">
                        <?php
                        if ($current_status == 0)
                            echo("Turn On System");
                        else
                            echo("Shut Down System");
                        ?>
                    </button>
                    <!--<button class="dark-bg-button" style="margin: 30px 0; width: 160px;" type="submit">Turn On System</button>-->

                    <hr style="border: 1px solid #dcc9ff; width: 100%;">

                    <p style="font-weight: bold;">Security Status - History</p>
                    <table>
                        <?php
                        if (mysqli_num_rows($result2) > 0) {

                            echo
                            '<tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>';

                            while ($row = mysqli_fetch_assoc($result2)) {
                                echo
                                    '<tr>
                            <td>' . $row['id'] . '</td>';
                                if ($row['status'] == 1) {
                                    echo '<td>Live</td>';
                                } else {
                                    echo '<td>Closed</td>';
                                }
                                echo '<td>' . $row['s_date'] . '</td>
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
    </div>

    <p class="legal-footer" style="background-color: transparent; color: #707070; padding: 20px 0 30px;">
        ©<span id="year"></span> Ceft Online. All rights reserved.
    </p>

</div>

<script>

    function shutdownSystem(status) {
        if (status === 0)
            status = 1;
        else
            status = 0;
        window.location.href = "../backend/admin/security/create.php?status=" + status;
    }

    // alert box
    alertBox("Operation successfully!", "Operation failed!");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>