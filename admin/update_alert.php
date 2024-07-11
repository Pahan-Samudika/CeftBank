<?php

session_start();
$role = $_SESSION['role'];

if ($role != 'admin') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

include_once('../backend/connection.php');

$aid = htmlentities($_GET['aid']);

$query = "SELECT * FROM alert WHERE to_user IS NULL AND aid = '$aid'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) != 1) {
    echo '<script>alert("Alert not found"); window.location.href = "./alerts.php";</script>';
    exit();
}

// Fetch the row
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Admin | Update Alert</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Admin | Update Alert | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Admin | Update Alert | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Admin | Update Alert | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Admin | Update Alert | Ceft Online">
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
        <a href="./alerts.php">Alerts</a>
        <span>></span>
        <a href="./update_alert.php?aid=<?php echo $aid; ?>">Update Alert</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1" style="width: 90%">

            <div class="">
                <div class="login-main-side container-mid login-grid-1">
                    <h1 style="margin: 10px 0 30px;">Update Alert</h1>

                    <p style="font-weight: bold;">Alert ID: <?php echo $aid ?></p>

                    <!--<input class="login-input" id="acc_no" type="text" placeholder="Bank account number">-->
                    <form action="../backend/admin/alert/update.php" method="post">
                        <input type="hidden" name="aid" value="<?php echo $aid ?>">
                        <label class="form-label" for="alert">Alert Message</label>
                        <textarea class="login-input" id="alert" name="alert"
                                  placeholder="Message"><?php echo $row['alert']; ?></textarea>
                        <br>
                        <button class="dark-bg-button" style="margin: 30px 0; width: 160px;" type="submit">Update
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
    function updateRedirect(aid) {
        window.location.href = "../backend/admin/alert/update.php?aid=" + aid;
    }

    function deleteRedirect(aid) {
        window.location.href = "../backend/admin/alert/delete.php?aid=" + aid;
    }
</script>

<script>
    // alert box
    alertBox("Update successful!", "Update failed!");

    // copyright year
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>