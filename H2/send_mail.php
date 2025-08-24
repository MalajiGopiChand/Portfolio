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

    // ✅ At this point, you can either:
    // 1. Save to database (requires DB connection here)
    // 2. Or send an email using PHP mail()
    // 3. Or just return success (default)

    echo "Thank you, $name! Your message has been sent.";
    exit;
} else {
    echo "Invalid request.";
    exit;
}

// ❌ Removed $conn->close() because no DB connection is opened here
?>
