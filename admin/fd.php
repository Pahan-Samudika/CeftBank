<?php

session_start();
$role = $_SESSION['role'];

if ($role != 'admin' && $role != 'manager') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

include_once('../backend/connection.php');

$query = "SELECT * FROM fd";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Admin | Fixed Deposit Requests</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Admin | Fixed Deposit Requests | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Admin | Fixed Deposit Requests | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Admin | Fixed Deposit Requests | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Admin | Fixed Deposit Requests | Ceft Online">
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
        <a href="./fd.php">FD request</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1" style="width: 90%">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Fixed Deposit Requests</h1>
                    <table>
                        <?php
                        if (mysqli_num_rows($result) > 0) {

                            echo
                            '<tr>
                            <th>ID</th>
                            <th>Applicant</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Maturity</th>
                            <th>Request Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>';

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo
                                    '<tr>
                                    <td>' . $row['req_id'] . '</td>
                                    <td>' . $row['name'] . '</td>
                                    <td>' . $row['amount'] . '</td>
                                    <td>' . $row['type'] . '</td>
                                    <td>' . $row['maturity'] . '</td>
                                    <td>' . $row['req_date'] . '</td>
                                    <td>' . $row['status'] . '</td>
                                    <td>';
                                if ($row['status'] != "Approved") {echo '<button onclick=\'updateRedirect(' . $row['req_id'] . ')\' class="table-btn">Approve</button>
                                        <br><br>';}
                                echo '<button onclick=\'deleteRedirect(' . $row['req_id'] . ')\' class="table-btn">Delete</button>
                                    </td>
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
    function updateRedirect(req_id) {
        window.location.href = "../backend/admin/fd/update.php?req_id=" + req_id;
    }

    function deleteRedirect(req_id) {
        window.location.href = "../backend/admin/fd/delete.php?req_id=" + req_id;
    }
</script>

<script>
    // alert box
    alertBox("Operation successfully!", "Operation failed!");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>