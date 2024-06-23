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

// Process form data and insert into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $license_plate = $_POST['license_plate'];
    $status = $_POST['status'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO Vehicles (make, model, year, color, license_plate, status)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $make, $model, $year, $color, $license_plate, $status);

    if ($stmt->execute()) {
        // Vehicle added successfully, show success message and redirect
        echo '<script>alert("Vehicle added successfully!"); window.location.href = "dashboard.html";</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
