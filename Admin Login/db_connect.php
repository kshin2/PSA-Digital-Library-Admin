<?php
$host = "localhost";  // Change if needed
$user = "root";  // Your MySQL username
$pass = "";  // Your MySQL password (default is empty in XAMPP)
$dbname = "library_db";  // Updated database name

// Create a connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
