<?php
include('db_connect.php');

// Establish connection to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all records from the civil_registration table, ordered by ID in descending order
$result = $conn->query("SELECT * FROM civil_registration ORDER BY id DESC");

$civilRecords = []; // Use a more descriptive variable name

// Fetch each row and store it in the $civilRecords array
while ($row = $result->fetch_assoc()) {
    $civilRecords[] = $row;
}

// Return the result as a JSON response
echo json_encode($civilRecords);

// Close the connection
$conn->close();
?>
