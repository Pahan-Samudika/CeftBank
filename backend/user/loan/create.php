<?php

session_start();
$uid = $_SESSION['uid'];

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $loan_type = htmlentities($_POST['lType']);
    $application_type = htmlentities($_POST['lAppType']);
    $name = htmlentities($_POST['cName']);
    $relationship = htmlentities($_POST['ReWithCeft']);

    $query = "INSERT INTO loan (
                    loan_type,
                    application_type,
                    applicant,
                    relationship,
                    uid
                ) VALUES (
                    '$loan_type',
                    '$application_type',
                    '$name',
                    '$relationship',
                    '$uid'
                )";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../dashboard/loan.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../dashboard/loan.php?succeed=false");
    }

    // Close the connection
    

}
?>