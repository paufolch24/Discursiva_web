<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $description = trim($_POST['description']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.html?status=invalid_email");
        exit;
    }

    // Email details
    $to = "ladiscursiva@gmail.com";
    $subject = "New Contact Us Form Submission";
    $message = "Name: $name\nEmail: $email\n\nMessage:\n$description";
    $headers = "From: $email";

    // Attempt to send the email
    if (mail($to, $subject, $message, $headers)) {
        header("Location: contact.html?status=success"); // Redirect with success status
    } else {
        header("Location: contact.html?status=error"); // Redirect with error status
    }
    exit();
} else {
    header("Location: contact.html?status=invalid_request");
    exit();
}
?>

