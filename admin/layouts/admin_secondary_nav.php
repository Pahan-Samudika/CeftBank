<?php

$role = $_SESSION['role'];

include_once('../backend/connection.php');

$query1 = "SELECT * FROM cyber_security ORDER BY id DESC LIMIT 1";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);
$current_status = $row1['status'];

if ($current_status == 0 && ($role != 'security' && $role != 'admin')) {
    echo '<script>alert("The system is closed! Try again later"); window.location.href="../backend/public/logout.php";</script>';
    exit();
}

echo '<div class="dash-nav-container container-mid">
    <nav class="dash-nav">';
        if ($role != 'admin') {echo '<a href="./user.php" style="font-weight: bold; padding: 5px 10px; border-radius: 20px; background-color: #fff;">Admin Panel</a>';}

        if ($role == 'manager' || $role == 'admin') {echo '<a href="./user.php">Users</a>';}
        if ($role == 'cashier' || $role == 'manager' || $role == 'admin') {echo '<a href="./new_user.php">Register User</a>';}
        if ($role == 'admin') {echo '<a href="./staff.php">Staff members</a>';}
        if ($role == 'admin') {echo '<a href="./new_staff.php">Register Staff</a>';}
        if ($role == 'cashier' || $role == 'manager' || $role == 'admin') {echo '<a href="./bank_account.php">Bank Accounts</a>';}
        if ($role == 'manager' || $role == 'admin') {echo '<a href="./fd.php">FD requests</a>';}
        if ($role == 'manager' || $role == 'admin') {echo '<a href="./loan.php">Loan requests</a>';}
        if ($role == 'cashier' || $role == 'manager' || $role == 'admin') {echo '<a href="./chequebook.php">Chequebooks requests</a>';}
        if ($role == 'admin') {echo '<a href="./alerts.php">Alerts</a>';}
        if ($role == 'manager' || $role == 'admin') {echo '<a href="./feedback.php">Feedbacks</a>';}
        if ($role == 'admin' || $role == 'security') {echo '<a href="./security.php">Cyber Security</a>';}

echo '</nav>
</div>';
?>