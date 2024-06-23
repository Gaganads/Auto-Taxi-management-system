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
$customer_id = $_POST['customer_id'];
$driver_id = $_POST['driver_id'];
$start_location = $_POST['start_location'];
$end_location = $_POST['end_location'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$fare_amount = $_POST['fare_amount'];
$status = $_POST['status'];

// SQL query to insert data into Rides table
$sql = "INSERT INTO Rides (customer_id, driver_id, start_location, end_location, start_time, end_time, fare_amount, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissssss", $customer_id, $driver_id, $start_location, $end_location, $start_time, $end_time, $fare_amount, $status);

// Execute the statement
if ($stmt->execute()) {
    // Close statement and connection
    $stmt->close();
    $conn->close();

    // JavaScript alert for success
    echo '<script>alert("New ride added successfully"); window.location.href = "dashboard.html";</script>';
} else {
    echo "Error: " . $stmt->error;
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
