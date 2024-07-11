<?php

session_start();
$role = $_SESSION['role'];

if ($role != 'admin' && $role != 'manager' && $role != 'cashier') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Admin | Register User</title>
    <link rel="icon" type="image/x-icon" href="../images/logos/favicon.ico">

    <!-- meta tags -->
    <meta name="title" content="Admin | Register User | Ceft Online">
    <meta name="description" content="Ceft Online platform enables your online financial needs">
    <meta name="author" content="Ceft Bank">
    <meta name="keywords" content="ceft, online banking, finance, bank"/>

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ceft.online/">
    <meta property="og:title" content="Admin | Register User | Ceft Online">
    <meta property="og:description" content="Ceft Online platform enables your online financial needs">
    <meta property="og:image" content="https://www.ceft.online/images/og.png">

    <meta property="twitter:card" content="Admin | Register User | Ceft Online">
    <meta property="twitter:url" content="https://www.ceft.online/">
    <meta property="twitter:title" content="Admin | Register User | Ceft Online">
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
        <a href="./">Users</a>
        <span>></span>
        <a href="./new_user.php">Register User</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="login-main-side container-mid login-grid-1" style="padding: 20px 30px;">
                <h1 style="margin: 10px 0;">Register User</h1>
            </div>

            <form action="../backend/admin/user/create.php" method="post">

                <input class="login-input" type="text" id="username" name="username" placeholder="Username" required><br>
                <input class="login-input" type="password" id="password" name="password" placeholder="Password" minlength="5" required><br>
                <input class="login-input" type="text" id="fname" name="fname" placeholder="First Name" required><br>
                <input class="login-input" type="text" id="lname" name="lname" placeholder="Last Name" required>
                <br><br>
                <label class="form-label" for="gender">Gender</label>
                <select class="login-input" name="gender" id="gender" style="height: inherit;">
                    <option value="">Select one</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br><br>

                <div id="dob" name="dob">
                    <label class="form-label" for="dob">Date of Birth</label>
                    <input class="login-input" type="date" id="dob" name="dob" required>
                </div>

                <input class="login-input" placeholder="NIC Number" type="text" id="nic" name="nic"
                       pattern="[0-9]{9}[Vv]||[0-9]{12}" required><br>
                <textarea class="login-input" placeholder="Address" id="address" name="address" row="5" cols="60"
                          required></textarea><br>
                <input class="login-input" type="tel" id="phone" name="phone" placeholder="Telephone Number"
                       pattern="[0-9]{10}" required><br>
                <input class="login-input" type="email" id="email" name="email" placeholder="Email" required><br>
                <button class="dark-bg-button" style="margin-top: 30px; margin-bottom: 30px; width: 160px;"
                        type="submit">
                    Register
                </button>
            </form>

        </div>
    </div>

    <p class="legal-footer" style="background-color: transparent; color: #707070; padding: 20px 0 30px;">
        ©<span id="year"></span> Ceft Online. All rights reserved.
    </p>
</div>

<script>
    // alert box
    alertBox("User registered successfully!", "User registration failed!");

    // copyright
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>