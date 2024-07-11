<?php

session_start();
$uid = $_SESSION['uid'];

include_once('../../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlentities($_POST['name']);
    $amount = htmlentities($_POST['amount']);
    $type = htmlentities($_POST['TandD']);
    $maturity = htmlentities($_POST['MaturityInstructions']);

    $query = "INSERT INTO fd (
                    name, 
                    amount,
                    type,
                    maturity,
                    uid
                ) VALUES (
                    '$name',
                    '$amount',
                    '$type',
                    '$maturity',
                    '$uid'
                )";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../dashboard/fd.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../dashboard/fd.php?succeed=false");
    }

// Close the connection
    

}

?>