<?php
include('db_connect.php');

// Create a new connection instance
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the WAM table (instead of special_releases)
$result = $conn->query("SELECT * FROM wam ORDER BY id DESC");

$wamRecords = []; // Use a more descriptive variable name

while ($row = $result->fetch_assoc()) {
    $wamRecords[] = $row;
}

// Output JSON
echo json_encode($wamRecords);

// Close the connection
$conn->close();
?>
