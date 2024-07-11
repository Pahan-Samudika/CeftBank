<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $aid = htmlentities($_POST['aid']);
    $alert = htmlentities($_POST['alert']);

    $query = "UPDATE alert SET alert = '$alert' WHERE aid = '$aid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../admin/update_alert.php?aid=" . $aid . "&succeed=true");
    } else {
        // Failure
        header("Location: ../../../admin/update_alert.php?aid=" . $aid . "&succeed=false");
    }

    // Close the connection
    

}
?>