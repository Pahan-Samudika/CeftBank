<?php

session_start();
$role = $_SESSION['role'];

if ($role != 'admin' && $role != 'manager') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

$uid = filter_var($_GET['uid'], FILTER_SANITIZE_NUMBER_INT);

include_once('../backend/connection.php');

$query = "SELECT uid, username, fname, lname, nic, gender, dob, address, phone, email FROM user WHERE uid = '$uid' AND role = 'customer' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) != 1) {
    echo '<script>alert("User not found"); window.location.href = "./user.php";</script>';
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
        <a href="./user.php">Users</a>
        <span>></span>
        <a href="./update_user.php?uid=<?php echo $uid; ?>">Update User</a>
    </div>

    <div class="dash-container container-mid">
        <div class="contact-form" id="dash1">

            <div class="login-main-side container-mid login-grid-1" style="padding: 20px 30px;">
                <h1 style="margin: 10px 0;">Update User</h1>
            </div>

            <form action="../backend/admin/user/update.php" method="post">

                <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                <label class="form-label" for="gender">Username</label>
                <input value="<?php echo $row['username'] ?>" class="login-input" type="text" id="username" name="username" placeholder="Username"
                       required><br>
                <label class="form-label" for="gender">First name</label>
                <input value="<?php echo $row['fname'] ?>" class="login-input" type="text" id="fname" name="fname" placeholder="First Name" required><br>

                <label class="form-label" for="gender">Last Name</label>
                <input value="<?php echo $row['lname'] ?>" class="login-input" type="text" id="lname" name="lname" placeholder="Last Name" required>
                <br><br>
                <label class="form-label" for="gender">Gender</label>
                <select class="login-input" name="gender" id="gender" style="height: inherit;">
                    <option <?php if ($row['gender'] == 'Male') {echo 'selected';} ?> value="Male">Male</option>
                    <option <?php if ($row['gender'] == 'Female') {echo 'selected';} ?> value="Female">Female</option>
                </select>
                <br><br>

                <div id="dob" name="dob">
                    <label class="form-label" for="dob">Date of Birth</label>
                    <input value="<?php echo $row['dob'] ?>" class="login-input" type="date" id="dob" name="dob" required>
                </div>

                <label class="form-label" for="gender">NIC Number</label>
                <input value="<?php echo $row['nic'] ?>" class="login-input" placeholder="NIC Number" type="text" id="nic" name="nic"
                       pattern="[0-9]{9}[Vv]||[0-9]{12}" required><br>
                <label class="form-label" for="gender">Address</label>
                <textarea class="login-input" placeholder="Address" id="address" name="address" row="5" cols="60"
                          required><?php echo $row['address'] ?></textarea><br>
                <label class="form-label" for="gender">Phone Number</label>
                <input value="<?php echo $row['phone'] ?>" class="login-input" type="tel" id="phone" name="phone" placeholder="Telephone Number"
                       pattern="[0-9]{10}" required><br>
                <label class="form-label" for="gender">Email</label>
                <input value="<?php echo $row['email'] ?>" class="login-input" type="email" id="email" name="email" placeholder="Email" required><br>
                <button class="dark-bg-button" style="margin-top: 30px; margin-bottom: 30px; width: 160px;"
                        type="submit">
                    Update
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
    alertBox("User updated successfully!", "User update failed!");

    // copyright
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>

</body>
</html>