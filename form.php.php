<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate and sanitize user input
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Check for valid email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please go back and try again.";
        exit;
    }

    // Specify your email address where you want to receive form submissions
    $to = "michaelweston175@gmail.com";

    // Subject of your email
    $subject = "New Business Description Request from $name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank you page
        header("Location: thank_you.html");
        exit;
    } else {
        echo "An error occurred while sending the email. Please try again later.";
    }
} else {
    // If this page is accessed directly, do something (e.g., show an error message)
    echo "Direct access not allowed!";
}
?>
