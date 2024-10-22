<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $description = htmlspecialchars(trim($_POST['description']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Set the recipient email address
    $to = "ladiscursiva@gmail.com";

    // Set the email subject
    $subject = "Contact from: $name";

    // Set the email message
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Description: $description\n";

    // Set the headers
    $headers = "From: $email\r\n"; // Use the user's email as the sender
    $headers .= "Reply-To: $email\r\n"; // Set the reply-to header
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n"; // Set content type

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to contact page with success message
        header("Location: contact.html?success=true");
        exit; // Always exit after redirect
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request method.";
}
?>
