<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Handle insert data action
    $status = htmlentities($_GET['status']);

    // insert status
    $query = "INSERT INTO cyber_security (status) VALUES ('$status')";
    $result = mysqli_query($conn, $query);


    if ($result) {
        // Success
        header("Location: ../../../admin/security.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../admin/security.php?succeed=false");
    }

    // Close the connection
    

}
?>