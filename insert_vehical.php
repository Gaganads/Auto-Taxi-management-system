<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "taxi"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$color = $_POST['color'];
$license_plate = $_POST['license_plate'];
$status = $_POST['status'];

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO Vehicles (make, model, year, color, license_plate, status) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $make, $model, $year, $color, $license_plate, $status);

// Execute the statement
if ($stmt->execute()) {
    echo "New vehicle added successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
