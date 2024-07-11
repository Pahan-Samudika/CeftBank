<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    session_start();
    $uid = filter_var($_SESSION['uid'], FILTER_SANITIZE_NUMBER_INT);
    $curr_pw = $_POST['curr_pw'];
    $new_pw = $_POST['new_pw'];
    $new_pw2 = $_POST['new_pw2'];

    // Check if the bank account belongs to user
    $query1 = "SELECT password FROM user WHERE uid = " . $uid . " LIMIT 1";
    $result1 = mysqli_query($conn, $query1);
    $hashedPassword = mysqli_fetch_assoc($result1)['password'];

    if (!password_verify($curr_pw, $hashedPassword)) {
        header("Location: ../../../admin/settings.php?password_error1=false");
        exit();
    }

    // Check if the new passwords match
    if ($new_pw !== $new_pw2) {
        header("Location: ../../../admin/settings.php?password_error2=false");
        exit();
    }

    $new_pw = password_hash($new_pw, PASSWORD_DEFAULT);

    // Prepare the SQL statement with placeholders
    $query = "UPDATE user SET password = '$new_pw' WHERE uid = '$uid'";

    $statement = mysqli_query($conn, $query);


    // Check if the record was created successfully
    if ($statement === true) {
        // success redirection
        header("Location: ../../../admin/settings.php?succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../admin/settings.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>