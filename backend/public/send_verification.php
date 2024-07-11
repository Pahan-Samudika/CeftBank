<?php

include_once("../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $email = $_POST['email'];

    // get uid of the user
    $query = "SELECT uid FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) != 1) {
        header("Location: ../../forgot.php?succeed=false");
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    $uid = $row['uid'];

    // generate code
    $code = rand(100000, 999999);

    // send reset code email - to demonstrate this functionality, the system has to be hosted on a server
    $to = $email;
    $subject = "Password Reset Code";
    $txt = "Your password reset code is " . $code . ". Please enter this code in the reset page.";
    $headers = "From: info@ceft.online";
    mail($to, $subject, $txt, $headers);

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO reset_password (code, uid, email) VALUES ('$code', '$uid', '$email')";
    $statement = mysqli_query($conn, $query);


    // Check if the record was created successfully
    if ($statement === true) {
        // success redirection
        header("Location: ../../reset.php?uid=" . $uid . "&succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../forgot.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>