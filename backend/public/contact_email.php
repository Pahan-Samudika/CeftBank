<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Handle form actions
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

// send email - to demonstrate this functionality, the system has to be hosted on a server
    $to = "info@ceft.online";
    $subject = "New Inquiry";
    $txt = "Name: " . $fname . " " . $lname . "\n" . "Tel: " . $tel . "\n" . "Email: " . $email . "\n" . "Message: " . $msg;
    $headers = "From: feedback@ceft.online";
    mail($to, $subject, $txt, $headers);

    echo
    '<script>
    alert("Thank you for your message. One of our team will be back soon!");
    window.location.href = "../../contact.php";
</script>';

}

?>