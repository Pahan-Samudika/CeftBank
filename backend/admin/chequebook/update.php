<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Handle insert data action
    $req_id = htmlentities($_GET['req_id']);

    // update chequebook
    $query = "UPDATE chequebook SET status = 'Approved' WHERE req_id = '$req_id'";
    $result = mysqli_query($conn, $query);


    // update alert
    $query = "SELECT uid FROM chequebook WHERE req_id = '$req_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $uid = $row['uid'];

    $query = "INSERT INTO alert (alert, to_user) VALUES ('Your chquebook request (ID: " . $req_id . ") approved', '$uid')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../admin/chequebook.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../admin/chequebook.php?succeed=false");
    }

    // Close the connection
    

}
?>