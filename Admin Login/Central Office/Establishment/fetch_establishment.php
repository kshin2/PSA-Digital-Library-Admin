<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records from the "establishment" table
$result = $conn->query("SELECT * FROM establishment ORDER BY id DESC");

$establishment = []; // Array to store the establishment data

while ($row = $result->fetch_assoc()) {
    $establishment[] = $row;
}

// Return the data as JSON
echo json_encode($establishment);

$conn->close();
?>
