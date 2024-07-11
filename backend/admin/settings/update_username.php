<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    session_start();
    $uid = $_SESSION['uid'];
    $username = $_POST['username'];

    // Prepare the SQL statement with placeholders
    $query = "UPDATE user SET username = '$username' WHERE uid = '$uid'";

    $statement = mysqli_query($conn, $query);

    // Check if the record was created successfully
    if ($statement == true) {
        // success redirection
        header("Location: ../../../admin/settings.php?&succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../admin/settings.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>