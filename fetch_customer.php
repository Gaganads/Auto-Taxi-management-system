<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <link rel="stylesheet" href="customer.css">
</head>
<body>
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

// SQL query to fetch customer details from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="customer-details">';
        echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
        echo '<p><strong>Phone:</strong> ' . $row["phone"] . '</p>';
        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
        echo '<p><strong>Vehicle:</strong> ' . $row["vehical"] . '</p>'; 
        echo '<p><strong>Pickup Location:</strong> ' . $row["pickup_location"] . '</p>';
        echo '<p><strong>Dropoff Location:</strong> ' . $row["dropoff_location"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No bookings found.";
}
$conn->close();
?>
