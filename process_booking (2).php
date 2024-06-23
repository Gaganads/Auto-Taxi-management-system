<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if (isset($_POST['book_now'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];

    // Insert booking details into database
   // Prepare SQL statement to insert booking details
   $sql = "INSERT INTO bookings (name, phone, email, pickup_location, dropoff_location) 
   VALUES (?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $phone, $email, $pickup_location, $dropoff_location);

// Execute the statement
if ($stmt->execute()) {
echo "Booking successful!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement
$stmt->close();
}

// Close connection
$conn->close();
?>
