<?php
// Include the database connection file
include ('Admin Login/db_connect.php');

// Query to fetch the records from the database
$sql = "SELECT * FROM records";
$result = $conn->query($sql);

// Initialize an array to store the records
$records = [];

if ($result->num_rows > 0) {
    // Loop through the results and store them in the records array
    while ($row = $result->fetch_assoc()) {
        $records[] = [
            "name" => $row["name"],
            "age" => $row["age"],
            "sex" => $row["sex"],
            "grade_course" => $row["grade_course"],
            "school" => $row["school"],
            "purpose" => $row["purpose"]
        ];
    }
} else {
    // No records found
    $records = [];
}

// Close the database connection (optional, if using a persistent connection in db_connect.php)
$conn->close();

// Set header to return JSON
header('Content-Type: application/json');

// Output the records as JSON
echo json_encode($records);
?>
