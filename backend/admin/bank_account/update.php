<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $acc = $_POST['acc'];
    $nic = $_POST['nic'];

    // Prepare the SQL statement with placeholders
    $query = "UPDATE bankAccount SET nic = '$nic' WHERE acc_no = '$acc'";

    $result = mysqli_query($conn, $query);

    // Check if the record was created successfully
    if ($result === TRUE) {
        // success redirection
        header("Location: ../../../admin/update_bank_account.php?acc=" . $acc . "&succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../admin/update_bank_account.php?acc=" . $acc . "&succeed=false");
        exit();
    }
    

}
?>