<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM special_releases ORDER BY id DESC");

$releases = []; // Use a more descriptive variable name

while ($row = $result->fetch_assoc()) {
    $releases[] = $row;
}

echo json_encode($releases);

$conn->close();
?>
