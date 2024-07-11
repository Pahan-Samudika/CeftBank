<?php

include_once("../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $code = $_POST['code'];
    $uid = $_POST['uid'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // check password
    if ($password !== $re_password) {
        header("Location: ../../reset.php?uid=" . $uid . "&succeed=false");
        exit();
    }

    // hash password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // verify code
    $query = "SELECT * FROM reset_password WHERE uid = '$uid' AND code = '$code'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) != 1) {
        header("Location: ../../reset.php?uid=" . $uid . "&succeed=false");
        exit();
    }

    // update password
    $query = "UPDATE user SET password = '$password' WHERE uid = '$uid'";
    $result = mysqli_query($conn, $query);

    // delete reset record
    $query = "DELETE FROM reset_password WHERE code = '$code' AND uid = '$uid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../login.php?reset=true");
    } else {
        // Failure
        header("Location: ../../reset.php?uid=" . $uid . "&succeed=false");
    }

    // Close the connection
    

}

?>