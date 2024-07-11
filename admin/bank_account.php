<?php

session_start();
$role = $_SESSION['role'];

if ($role != 'admin' && $role != 'manager' && $role != 'cashier') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

include_once('../backend/connection.php');

$query = "SELECT acc_no, nic, balance, created_date FROM bankAccount";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Admin | Bank Accounts</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Admin | Bank Accounts | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Admin | Bank Accounts | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Admin | Bank Accounts | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Admin | Bank Accounts | Ceft Online">
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

<div class="dashboard-board">

    <div class="container breadcrumb">
        <a href="./bank_account.php">Bank Accounts</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1" style="width: 90%">

            <div class="login-main-side container-mid login-grid-1" style="padding: 20px 30px;">
                <h1 style="margin: 10px 0;">Create Bank Account</h1>
            </div>

            <form action="../backend/admin/bank_account/create.php" method="post">

                <input class="login-input" placeholder="NIC Number" type="text" id="nic" name="nic"
                       pattern="[0-9]{9}[Vv]||[0-9]{12}" required><br>


                <button class="dark-bg-button" style="margin-top: 30px; margin-bottom: 30px; width: 160px;"
                        type="submit">
                    Create Account
                </button>
            </form>

            <div class="">
                <div class="login-main-side container-mid login-grid-1" style="overflow-x: auto;">
                    <h1 style="margin: 10px 0 30px;">Bank Accounts</h1>
                    <table>

                        <?php
                        if (mysqli_num_rows($result) > 0) {

                            echo '<tr>
                            <th>Account No</th>
                            <th>NIC</th>
                            <th>Balance</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>';

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo
                                    '<tr>
                                    <td>' . $row['acc_no'] . '</td>
                                    <td>' . $row['nic'] . '</td>
                                    <td>' . $row['balance'] . '</td>
                                    <td>' . $row['created_date'] . '</td>
                                    <td>
                                    <button onclick=\'updateRedirect(' . $row['acc_no'] . ')\' class="table-btn">Update</button><button onclick=\'deleteRedirect(' . $row['acc_no'] . ')\' class="table-btn">Delete</button></td>
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
    function updateRedirect(acc) {
        window.location.href = "./update_bank_account.php?acc=" + acc;
    }

    function deleteRedirect(acc) {
        window.location.href = "../backend/admin/bank_account/delete.php?acc=" + acc;
    }
</script>

<script>
    // alert box
    alertBox("Operation successful!", "Operation failed!");

    // copyright
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>