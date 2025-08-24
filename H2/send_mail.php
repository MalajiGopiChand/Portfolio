<?php

// Simple contact form handler for AJAX POST

// Set response header
header('Content-Type: text/plain');

// Check if POST data exists
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Basic validation
    if (!$name || !$email || !$subject || !$message) {
        echo "Please fill in all fields.";
        exit;
    }

    // Optionally, save to database (already handled in index.php if you want)
    // Or send an email (requires mail server setup)
    // Example: just return success for now

    echo "Thank you, $name! Your message has been sent.";
    exit;
} else {
    echo "Invalid request.";
    exit;
}
$conn->close();


?>
