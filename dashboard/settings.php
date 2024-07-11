<?php
session_start();
$uid = filter_var($_SESSION['uid'], FILTER_SANITIZE_NUMBER_INT);

include_once('../backend/connection.php');

$query = "SELECT bank_account, linked_date FROM user_bankAccount WHERE uid = '$uid'";
$result = mysqli_query($conn, $query);

$query2 = "SELECT username FROM user WHERE uid = '$uid'";
$result2 = mysqli_query($conn, $query2);

if ($result2 && mysqli_num_rows($result2) != 1) {
    echo '<script>alert("User not found"); window.location.href = "../backend/public/logout.php";</script>';
    exit();
}

// Fetch the row
$row2 = mysqli_fetch_assoc($result2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Settings</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Settings | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Settings | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Settings | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Settings | Ceft Online">
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
        <a href="./settings.php">Settings</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="login-main-side container-mid login-grid-1" style="padding: 20px 30px;">
                <h1 style="margin: 10px 0;">Settings</h1>
                <h3>Manage Accounts</h3>

                <form action="../backend/user/bank_account/create.php" method="POST">
                    <input class="login-input" name="acc_no" id="acc_no" type="number" pattern="[0-9]{5}" required
                           placeholder="Bank account number">
                    <button class="dark-bg-button" style="margin: 30px 0; width: 160px;" type="submit">Link Bank
                        Account
                    </button>
                </form>

                <table>
                    <?php
                    if (mysqli_num_rows($result) > 0) {

                        echo
                        '<tr>
                            <th>Bank Account</th>
                            <th>Linked Date</th>
                            <th>Action</th>
                        </tr>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                                '<tr>
                                    <td>' . $row['bank_account'] . '</td>
                                    <td>' . $row['linked_date'] . '</td>
                                    <td>
                                        <button onclick=\'unlinkRedirect(' . $row['bank_account'] . ')\' class="table-btn">Unlink</button>
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    
                    ?>
                </table>

            </div>

            <hr style="border: 1px solid #dcc9ff">

            <div class="login-main-side container-mid login-grid-1">
                <h3>Change Username</h3>

                <p style="font-weight: bold;">Current username: <span
                        style="color: #701dff; font-weight: bold;"><?php echo $row2['username']; ?></span></p>

                <form action="../backend/user/settings/update_username.php" method="POST">
                    <input class="login-input" name="username" id="username" required type="text" placeholder="New username">
                    <button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Change Username
                    </button>
                </form>


            </div>

            <hr style="border: 1px solid #dcc9ff">

            <div class="login-main-side container-mid login-grid-1">
                <h3>Change Password</h3>

                <form action="../backend/user/settings/update_password.php" method="POST">
                    <input class="login-input" id="curr_pw" name="curr_pw" required type="password" minlength="5" placeholder="Current password"><br>
                    <input class="login-input" id="new_pw" name="new_pw" required type="password" minlength="5" placeholder="New password"><br>
                    <input class="login-input" id="new_pw2" name="new_pw2" required type="password" minlength="5" placeholder="Re-type password"><br>
                    <br>
                    <button class="dark-bg-button" style="margin-top: 30px; width: 160px;" type="submit">Change Password
                    </button>
                </form>
            </div>

        </div>
    </div>

    <p class="legal-footer" style="background-color: transparent; color: #707070; padding: 20px 0 30px;">
        ©<span id="year"></span> Ceft Online. All rights reserved.
    </p>

</div>

<script>
    function unlinkRedirect(acc) {
        window.location.href = "../backend/user/bank_account/delete.php?acc=" + acc;
    }
</script>


<script>
    // alert box
    alertBox("Operation successful", "Operation failed");
    alertBoxSettings1("The bank account is not associated with your NIC");
    passwordChange1("Current password is incorrect");
    passwordChange2("New passwords do not match");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>