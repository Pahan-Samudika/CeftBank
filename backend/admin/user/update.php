<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $uid = $_POST['uid'];
    $user_name = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Prepare the SQL statement with placeholders
    $query = "UPDATE user SET 
                username = '$user_name',
                fname = '$fname', 
                lname = '$lname', 
                nic = '$nic', 
                gender = '$gender', 
                dob = '$dob', 
                address = '$address', 
                phone = '$phone', 
                email = '$email' WHERE uid = '$uid'";

    $statement = mysqli_query($conn, $query);


    // Check if the record was created successfully
    if ($statement === true) {
        // success redirection
        header("Location: ../../../admin/update_user.php?uid=" . $uid . "&succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../admin/update_user.php?uid=" . $uid . "&succeed=false");
        exit();
    }

    // Close the connection
    

}
?>