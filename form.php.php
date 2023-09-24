<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Specify your email address where you want to receive form submissions
    $to = "michaelweston175@gmail.com";
    
    // Subject of your email
    $subject = "New Business Description Request from $name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message";

    // Additional headers
    $headers = "From: $name <$email>";

    // Send the email
    mail($to, $subject, $email_content, $headers);

    // Redirect back to the thank you page
    header("Location: thank_you.html");
} else {
    // If this page is accessed directly, do something (e.g., show an error message)
    echo "Direct access not allowed!";
}
?>
