<?php

include_once("../../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Get the acc from the request
    $acc = $_GET['acc'];

    // query
    $query = "DELETE FROM user_bankAccount WHERE bank_account = '$acc'";

    // prepare query statement
    $statement = mysqli_query($conn, $query);

    // Check if the record was created successfully
    if ($statement === true) {
        // success redirection
        header("Location: ../../../dashboard/settings.php?succeed=true");
    } else {
        // failed redirection and error logging
        echo"Execution failed: " . mysqli_error($conn);
        header("Location: ../../../dashboard/settings.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>