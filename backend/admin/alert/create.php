<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $alert = htmlentities($_POST['alert']);

    $query = "INSERT INTO alert (alert) VALUES ('$alert')";
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