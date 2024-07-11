<?php

session_start();
$role = $_SESSION['role'];

if ($role != 'admin' && $role != 'manager') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

include_once('../backend/connection.php');

$query = "SELECT * FROM feedback";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Admin | Feedbacks</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Admin | Feedbacks | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Admin | Feedbacks | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Admin | Feedbacks | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Admin | Feedbacks | Ceft Online">
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
        <a href="./feedback.php">Feedbacks</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1" style="width: 90%">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Feedbacks</h1>
                    <table>
                        <?php
                        if (mysqli_num_rows($result) > 0) {

                            echo
                            '<tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Rating</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>';

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo
                                    '<tr>
                                    <td>' . $row['f_id'] . '</td>
                                    <td>' . $row['uid'] . '</td>
                                    <td>' . $row['rating'] . '</td>
                                    <td>' . $row['msg'] . '</td>
                                    <td>' . $row['f_date'] . '</td>
                                    <td>' . $row['status'] . '</td>
                                    <td>
                                        ';
                                if ($row['status'] != "Viewed") {echo '<button onclick=\'updateRedirect(' . $row['f_id'] . ')\' class="table-btn">Mark as read</button>';}
                                        echo '<button onclick=\'deleteRedirect(' . $row['f_id'] . ')\' class="table-btn">Delete</button>
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
    function updateRedirect(f_id) {
        window.location.href = "../backend/admin/feedback/update.php?f_id=" + f_id;
    }
    function deleteRedirect(f_id) {
        window.location.href = "../backend/admin/feedback/delete.php?f_id=" + f_id;
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