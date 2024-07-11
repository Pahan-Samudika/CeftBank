<?php

$role = $_SESSION['role'];

if ($role != 'customer') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
}

include_once('../backend/connection.php');

$query1 = "SELECT * FROM cyber_security ORDER BY id DESC LIMIT 1";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);
$current_status = $row1['status'];

if ($current_status == 0) {
    echo '<script>alert("The system is closed! Try again later"); window.location.href="../backend/public/logout.php";</script>';
    exit();
}

echo '<div class="dash-nav-container container-mid">
    <nav class="dash-nav">
        <a href="./">Dashboard</a>
        <a href="./transfer.php">Transfers and Payments</a>
        <a href="./fd.php">Investments</a>
        <a href="./loan.php">Loans</a>
        <a href="./chequebook.php">Request chequebooks</a>
        <a href="./alerts.php">Alerts</a>
        <a href="./feedback.php">Feedback</a>
    </nav>
</div>';
?>
