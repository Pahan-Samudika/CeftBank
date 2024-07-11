<?php

include_once("../../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    $role = "customer";

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO user (
                  username, 
                  password, 
                  fname, 
                  lname, 
                  nic, 
                  gender, 
                  dob, 
                  address, 
                  phone, 
                  email, 
                  role
                  ) VALUES ('$user_name', '$password', '$fname', '$lname', '$nic', '$gender', '$dob', '$address', '$phone', '$email', '$role')";
    $statement = mysqli_query($conn, $query);

    // Check if the record was created successfully
    if ($statement === true) {
        // success redirection
        header("Location: ../../../admin/new_user.php?succeed=true");
    } else {
        // failed redirection and error logging
        error_log("Execution failed: " . mysqli_error($conn));
        header("Location: ../../../admin/new_user.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>