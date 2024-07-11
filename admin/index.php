<?php
session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['uid'])) {
    header('Location: ../login.php');
    exit();
}

if ($role != 'admin' && $role != 'manager' && $role != 'cashier' && $role != 'security') {
    echo '<script>alert("You are not authorized to access this page"); window.location.href="../login.php";</script>';
    exit();
} else {
    header('Location: ../login.php');
    exit();
}

?>