<?php

session_start();
$uid = $_SESSION['uid'];

include_once("../../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Handle insert data action
    $rating = htmlentities(intval($_POST['rate']));
    $msg = htmlentities($_POST['msg']);

    $query = "INSERT INTO feedback (
                    rating,
                    uid,
                    msg
                ) VALUES (
                    '$rating',
                    '$uid',
                    '$msg'
                )";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../dashboard/feedback.php?succeed=true");
    } else {
        // Failure
        echo mysqli_error($conn);
//        header("Location: ../../../dashboard/feedback.php?succeed=false");
    }

// Close the connection
    

}

?>