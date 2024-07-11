<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the form data
    $from_acc = htmlentities($_POST['fa']);
    $to_acc = htmlentities($_POST['ban']);
    $amount = htmlentities($_POST['amt']);
    $purpose = htmlentities($_POST['pop']);

    // check recipient account number
    $query = "SELECT * FROM bankAccount WHERE acc_no = '$to_acc'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $acc_no = $row['acc_no'];

    if ($acc_no == null) {
        // Invalid account number
        header("Location: ../../../dashboard/transfer.php?invalid=true");
        exit();
    }

    // Check if the account balance is sufficient
    $query = "SELECT balance FROM bankAccount WHERE acc_no = '$from_acc'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $balance = $row['balance'];

    if ($balance < $amount) {
        // Insufficient balance
        header("Location: ../../../dashboard/transfer.php?insufficient=true");
        exit();
    }

    // Deduct the amount from the sender's account
    $query = "UPDATE bankAccount SET balance = balance - '$amount' WHERE acc_no = '$from_acc'";
    $result = mysqli_query($conn, $query);

    // Add the amount to the receiver's account
    $query = "UPDATE bankAccount SET balance = balance + '$amount' WHERE acc_no = '$to_acc'";
    $result = mysqli_query($conn, $query);

    // Send notification to the receiver
    $query = "SELECT uid FROM user_bankAccount WHERE bank_account = '$to_acc'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $uid = $row['uid'];

    $query = "INSERT INTO alert (
                            alert,
                            to_user
                         ) VALUES ('You have received LKR $amount.00 from Acc No. $from_acc', '$uid')";
    $result = mysqli_query($conn, $query);

    // Transaction record
    $query = "INSERT INTO transaction (
                            from_acc,
                            to_acc,
                            amount,
                            purpose,
                            type
                         ) VALUES ('$from_acc', '$to_acc', '$amount', '$purpose', 'intrabank')";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../dashboard/transfer.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../dashboard/transfer.php?succeed=false");
    }

    // Close the connection
    

}
?>