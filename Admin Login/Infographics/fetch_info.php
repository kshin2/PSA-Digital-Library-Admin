<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM infographics ORDER BY id DESC");

$infographics = []; // Array to store the infographic data

// Fetch each row and store it in the $infographics array
while ($row = $result->fetch_assoc()) {
    $infographics[] = $row;
}

// Return the data as a JSON response
echo json_encode($infographics);

$conn->close();
?>
