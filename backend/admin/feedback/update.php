<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Handle insert data action
    $f_id = htmlentities($_GET['f_id']);

    // Update feedback
    $query = "UPDATE feedback SET status = 'Viewed' WHERE f_id = '$f_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../admin/feedback.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../admin/feedback.php?succeed=false");
    }

    // Close the connection
    

}
?>