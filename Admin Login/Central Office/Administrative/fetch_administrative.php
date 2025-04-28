<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records from the "administrative" table
$result = $conn->query("SELECT * FROM administrative ORDER BY id DESC");

$administrative = []; // Array to store the administrative data

while ($row = $result->fetch_assoc()) {
    $administrative[] = $row;
}

// Return the data as JSON
echo json_encode($administrative);

$conn->close();
?>
