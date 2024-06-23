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
$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$license_number = $_POST['license_number'];
$vehicle_number = $_POST['vehicle_number'];
$status = $_POST['status'];

// SQL query to insert data into Drivers table
$sql = "INSERT INTO Drivers (name, phone_number, email, license_number, vehicle_number, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $phone_number, $email, $license_number, $vehicle_number, $status);

// Execute the statement
if ($stmt->execute()) {
    echo '<script>alert("New driver added successfully"); window.location.href = "dashboard.html";</script>';
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
