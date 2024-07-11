<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Handle insert data action
    $aid = htmlentities($_GET['aid']);

    $query = "DELETE FROM alert WHERE aid = '$aid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../admin/alerts.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../admin/alerts.php?succeed=false");
    }

    // Close the connection
    

}
?>