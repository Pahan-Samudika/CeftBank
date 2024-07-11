<?php

include_once("../../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Get the uid from the request
    $uid = $_GET['uid'];

    // query
    $query = "DELETE FROM user WHERE uid = '$uid'";

    // prepare query statement
    $statement = mysqli_query($conn, $query);

    // Check if the record was created successfully
    if ($statement === true) {
        // success redirection
        header("Location: ../../../admin/user.php?succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../admin/user.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>