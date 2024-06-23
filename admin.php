<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are correct (dummy credentials for demonstration)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy credentials for demonstration
    $admin_username = "admin";
    $admin_password = "admin123";

    if ($username === $admin_username && $password === $admin_password) {
        // Redirect to admin panel or any desired page upon successful login
        header("Location: dashboard.html");
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>
