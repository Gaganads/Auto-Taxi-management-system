<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Vehicles</title>
    <style>
        /* CSS style for vehicle list */
        .vehicle {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        .vehicle h3 {
            margin-bottom: 5px;
        }

        .vehicle p {
            margin: 5px 0;
        }

        .no-results {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>List of Vehicles</h1>
    <?php
    // Create connection to MySQL database
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "taxi"; // Your MySQL database name
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Default vehicles array
    $defaultVehicles = [
        ['make' => 'Toyota', 'model' => 'Camry', 'year' => '2020', 'color' => 'Red', 'license_plate' => 'XYZ123', 'status' => 'available'],
        ['make' => 'Honda', 'model' => 'Civic', 'year' => '2019', 'color' => 'Blue', 'license_plate' => 'ABC456', 'status' => 'in use']
    ];

    // Output default vehicles
    foreach ($defaultVehicles as $vehicle) {
        echo '<div class="vehicle">';
        echo '<h3>Make: ' . $vehicle["make"] . ' - Model: ' . $vehicle["model"] . ' - Year: ' . $vehicle["year"] . '</h3>';
        echo '<p>Color: ' . $vehicle["color"] . '</p>';
        echo '<p>License Plate: ' . $vehicle["license_plate"] . '</p>';
        echo '</div>';
    }

    // SQL query to fetch vehicles data from the database
    $sql = "SELECT * FROM Vehicles";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row from the database
        while ($row = $result->fetch_assoc()) {
            echo '<div class="vehicle">';
            echo '<h3>Make: ' . $row["make"] . ' - Model: ' . $row["model"] . ' - Year: ' . $row["year"] . '</h3>';
            echo '<p>Color: ' . $row["color"] . '</p>';
            echo '<p>License Plate: ' . $row["license_plate"] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p class="no-results">No results found.</p>';
    }

    // Close database connection
    $conn->close();
    ?>
</body>
</html>
