<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["Subscribe-Email"]; // Fetch the email address from the form

    // Email configuration
    $to = "darrennasa@gmail.com";  // Replace with your email address
    $subject = "New subscription from: " . $email;
    $message = "You have a new subscriber: $email";

    // Headers for the email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";  // Set content type to plain text

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for subscribing!";
    } else {
        echo "Message sending failed. Please try again.";
        error_log("Mail function failed. Check your mail server configuration.");
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $firstName = isset($_POST['First-Name']) ? $_POST['First-Name'] : '';
    $lastName = isset($_POST['Last-Name']) ? $_POST['Last-Name'] : '';
    $phone = isset($_POST['Your-phone']) ? $_POST['Your-phone'] : '';
    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $subject = isset($_POST['Subject']) ? $_POST['Subject'] : '';
    $message = isset($_POST['Message']) ? $_POST['Message'] : '';

    // Email configuration
    $to = "darrennasa@gmail.com"; // Replace with your email address
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8"; // Ensuring correct encoding
    
    // Creating the email content
    $fullMessage = "First Name: $firstName\nLast Name: $lastName\nPhone: $phone\nEmail: $email\n\nMessage:\n$message";

    // Sending email
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Thank you for your message!";
    } else {
        echo "Message sending failed. Please try again.";
    }
} else {
    echo "Invalid form submission.";
}
?>
