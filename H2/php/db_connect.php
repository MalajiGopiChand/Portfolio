<?php
// Optional: Database connection (only if you plan to use it elsewhere)
$servername = "localhost";
$username = "root";      // Replace with your MySQL username
$password = "";          // Replace with your MySQL password
$dbname = "portfolio_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// You can remove all form-handling code here, as submission is disabled

// Close connection
$conn->close();
?>
