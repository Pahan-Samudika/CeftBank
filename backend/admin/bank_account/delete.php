<?php

include_once("../../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Get the acc from the request
    $acc = $_GET['acc'];

    // query
    $query = "DELETE FROM bankAccount WHERE acc_no = '$acc'";
    $result = mysqli_query($conn, $query);

    if ($result === TRUE) {
        // success redirection
        header("Location: ../../../admin/bank_account.php?succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../admin/bank_account.php?succeed=false");
        exit();
    }

    

}
?>