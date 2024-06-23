<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Driver Details</title>
<style>
.driver-details {
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 15px;
}

.driver-details p {
    margin: 5px 0;
}

.driver-details p strong {
    font-weight: bold;
}

.driver-details p:nth-child(even) {
    background-color: #e9e9e9;
}
</style>
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

// Default drivers array
$defaultDrivers = [
    ['name' => 'James', 'phone_number' => '9889786675', 'email' => 'james@gmail.com', 'license_number' => 'LIC123', 'vehicle_number' => 'KA 17 EH 123', 'status' => 'available'],
    ['name' => 'Harry', 'phone_number' => '7875654378', 'email' => 'harry@gamil.com', 'license_number' => 'LIC456', 'vehicle_number' => 'KA 17 LB 687', 'status' => 'in use']
];

// Output default drivers
foreach ($defaultDrivers as $driver) {
    echo '<div class="driver-details">';
    echo '<p><strong>Name:</strong> ' . $driver["name"] . '</p>';
    echo '<p><strong>Phone Number:</strong> ' . $driver["phone_number"] . '</p>';
    echo '<p><strong>Email:</strong> ' . $driver["email"] . '</p>';
    echo '<p><strong>License Number:</strong> ' . $driver["license_number"] . '</p>';
    echo '<p><strong>Vehicle Number:</strong> ' . $driver["vehicle_number"] . '</p>';
    echo '<p><strong>Status:</strong> ' . $driver["status"] . '</p>';
    echo '</div>';
}

// SQL query to fetch drivers from the database
$sql = "SELECT * FROM Drivers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row from the database
    while($row = $result->fetch_assoc()) {
        echo '<div class="driver-details">';
        echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
        echo '<p><strong>Phone Number:</strong> ' . $row["phone_number"] . '</p>';
        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
        echo '<p><strong>License Number:</strong> ' . $row["license_number"] . '</p>';
        echo '<p><strong>Vehicle Number:</strong> ' . $row["vehicle_number"] . '</p>';
        echo '<p><strong>Status:</strong> ' . $row["status"] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p class="no-results">No drivers found.</p>';
}
$conn->close();
?>
</body>
</html>
