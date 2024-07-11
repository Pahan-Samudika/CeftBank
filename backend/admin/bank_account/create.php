<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $nic = $_POST['nic'];

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO bankAccount (nic) VALUES ('$nic')";
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