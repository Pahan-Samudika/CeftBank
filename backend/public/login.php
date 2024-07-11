<?php

include_once("../connection.php");

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle insert data action
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement with placeholders
    $query = "SELECT password, role, uid, fname, nic FROM user WHERE username = ?";
    $statement = mysqli_prepare($conn, $query);

    if (!$statement) {
        error_log("Prepare statement failed: " . mysqli_error($conn));
        header("Location: ../../login.php?succeed=false");
        exit();
    }

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($statement, "s", $user_name);

    // Execute the prepared statement
    $executeResult = mysqli_stmt_execute($statement);

    // Bind the result variables
    mysqli_stmt_bind_result($statement, $hashedPassword, $role, $uid, $fname, $nic);

    // Fetch the results
    if (mysqli_stmt_fetch($statement)) {

        if (password_verify($password, $hashedPassword)) {

            // password is correct
            session_start();
            $_SESSION['fname'] = $fname;
            $_SESSION['uid'] = $uid;
            $_SESSION['role'] = $role;
            $_SESSION['nic'] = $nic;

            if ($role == "customer") {
                header("Location: ../../dashboard");
            } else if ($role == "cashier") {
                header("Location: ../../admin/new_user.php");
            } else if ($role == "manager" || $role == "admin") {
                header("Location: ../../admin/user.php");
            } else if ($role == "security") {
                header("Location: ../../admin/security.php");
            }

            exit();

        } else {
            // password is incorrect
            header("Location: ../../login.php?succeed=false");
            exit();
        }

    } else {
        // no user found
        header("Location: ../../login.php?succeed=false");
        exit();
    }

    // Close the connection
    

}
?>