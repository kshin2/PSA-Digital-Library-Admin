<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records from the "household" table
$result = $conn->query("SELECT * FROM household ORDER BY id DESC");

$household = []; // Array to store the household data

while ($row = $result->fetch_assoc()) {
    $household[] = $row;
}

// Return the data as JSON
echo json_encode($household);

$conn->close();
?>
