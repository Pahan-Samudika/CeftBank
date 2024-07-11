<?php

session_start();
$uid = $_SESSION['uid'];

include_once("../../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $count = htmlentities($_POST['NBook']);
    $phone = htmlentities($_POST['CNUmber']);
    $branch = htmlentities($_POST['Rbranch']);

    $query = "INSERT INTO chequebook (
                    count,
                    uid,
                    phone,
                    branch
                ) VALUES (
                    '$count',
                    '$uid',
                    '$phone',
                    '$branch'
                )";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Success
        header("Location: ../../../dashboard/chequebook.php?succeed=true");
    } else {
        // Failure
        header("Location: ../../../dashboard/chequebook.php?succeed=false");
    }

// Close the connection
    

}

?>