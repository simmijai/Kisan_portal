<?php
session_start();

// Database configuration
$servername = "localhost"; // Change this to your database servername
$username = "your_username"; // Change this to your database username
$password = "your_password"; // Change this to your database password
$database = "your_database"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to fetch user from database based on email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session and redirect
            $_SESSION['user_id'] = $row['id']; // You may want to store more user data in session
            header("Location: dashboard.php"); // Redirect to dashboard or any other page
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "User not found.";
    }
}

// Close connection
$conn->close();
?>
