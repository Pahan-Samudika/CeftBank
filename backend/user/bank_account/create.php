<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    session_start();
    $uid = $_SESSION['uid'];
    $nic = $_SESSION['nic'];
    $acc = $_POST['acc_no'];


    // Check if the bank account belongs to user
    $query1 = "SELECT * FROM bankAccount WHERE acc_no = " . $acc . " AND nic = " . $nic . " LIMIT 1";
    $result1 = mysqli_query($conn, $query1);
    if ($result1 && mysqli_num_rows($result1) != 1) {
        header("Location: ../../../dashboard/settings.php?bank_account=false");
        exit();
    }

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO user_bankAccount (uid, bank_account) VALUES (?, ?)";
    $result = mysqli_query($conn, $sql);


    // Check if the record was created successfully
    if ($result === true) {
        // success redirection
        header("Location: ../../../dashboard/settings.php?succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../dashboard/settings.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>