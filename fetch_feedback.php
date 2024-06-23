<!DOCTYPE html>
<html>
<head>
    <title>Feedback Details</title>
    <link rel="stylesheet" href="feedback.css">
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

// SQL query to retrieve feedback details
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="feedback-item">';
        echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
        echo '<p><strong>Feedback:</strong> ' . $row["feedback_message"] . '</p>';
        echo '<p class="feedback-date"><strong>Feedback Date:</strong> ' . $row["feedback_date"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No feedback found.";
}
$conn->close();
?>
