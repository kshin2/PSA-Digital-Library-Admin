<?php
// Include the database connection file
include ('db_connect.php');

// Get optional start and end date from GET request
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : null;
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : null;

// Start building query
$sql = "SELECT * FROM records WHERE 1=1";

// Apply date filtering if both dates are provided
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " AND DATE(created_at) BETWEEN '$startDate' AND '$endDate'";
}

// Order by created_at descending
$sql .= " ORDER BY created_at DESC";

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
            "purpose" => $row["purpose"],
            "created_at" => $row["created_at"]
        ];
    }
}

// Close the database connection
$conn->close();

// Set header to return JSON
header('Content-Type: application/json');

// Output the records as JSON
echo json_encode($records);
?>
