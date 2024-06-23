<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "taxi";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO feedback (name, feedback_message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $feedback_message);

// Set parameters and execute
$name = $_POST['name'];
$feedback_message = $_POST['feedback_message'];
$stmt->execute();

echo "<script>alert('Thank you for your feedback');</script>";
    echo '<script>window.location.href="customer.html";</script>';

// Close statement and connection
$stmt->close();
$conn->close();
?>
