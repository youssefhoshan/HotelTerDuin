<?php

require __DIR__ . '/vendor/autoload.php';


use Dotenv\Dotenv;
use SendGrid\Mail\Mail;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Retrieve SendGrid API key from environment variables
$apiKey = $_ENV['SENDGRID_API_KEY'];

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Create a new SendGrid instance
$sendgrid = new \SendGrid($apiKey);

// Create a new SendGrid email
$mail = new Mail();
$mail->setFrom($email, $name);
$mail->setSubject('New Contact Form Submission');
$mail->addTo($_ENV['RECIPIENT_EMAIL']); // Change this to your desired recipient email address
$mail->addContent("text/plain", $message);

// Send the email
try {
    $response = $sendgrid->send($mail);
    if ($response->statusCode() === 202) {
        echo 'Email sent successfully!';
    } else {
        echo 'Failed to send email. Status code: ' . $response->statusCode();
    }
} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}
