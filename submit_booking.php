<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "taxi"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pickup_location = $_POST['pickup_location']; // Corrected key
$dropoff_location = $_POST['dropoff_location']; // Corrected key


// Prepare SQL statement to insert data into database
$sql = "INSERT INTO bookings (name, phone, email, pickup_location, dropoff_location) VALUES ('$name', '$phone', '$email', '$pickup_location', '$dropoff_location')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Booking submitted successfully');</script>";
    echo '<script>window.location.href="customer.html";</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
