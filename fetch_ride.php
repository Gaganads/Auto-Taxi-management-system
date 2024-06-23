<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rides List</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f2f2f2;
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

// SQL query to fetch data from Rides table
$sql = "SELECT customer_id, driver_id, start_location, end_location FROM Rides";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<h1>Rides List</h1>";
    echo "<table>";
    echo "<tr><th>Customer ID</th><th>Driver ID</th><th>Start Location</th><th>End Location</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["customer_id"]."</td>";
        echo "<td>".$row["driver_id"]."</td>";
        echo "<td>".$row["start_location"]."</td>";
        echo "<td>".$row["end_location"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No rides found.";
}

// Close connection
$conn->close();
?>
</body>
</html>
