<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Handle insert data action
    $req_id = htmlentities($_GET['req_id']);

    $query = "DELETE FROM loan WHERE req_id = '$req_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../admin/loan.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../admin/loan.php?succeed=false");
    }

    // Close the connection
    

}
?>