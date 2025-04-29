<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";
$conn = new mysqli($host, $username, $password, $database);

$project = isset($_POST['project']) ? $conn->real_escape_string($_POST['project']) : '';
$limit = 10;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$start = ($page - 1) * $limit;
$queryStr = isset($_POST['query']) ? $conn->real_escape_string($_POST['query']) : '';

// Apply search if needed
$conditions = [];

if (!empty($queryStr)) {
    $conditions[] = "(administrative_title LIKE '%$queryStr%' OR administrative_project LIKE '%$queryStr%')";
}
if (!empty($project)) {
    $conditions[] = "administrative_project = '$project'";
}

$searchQuery = count($conditions) > 0 ? "WHERE " . implode(" AND ", $conditions) : "";


// Get total filtered records
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM administrative $searchQuery");
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Get paginated filtered records
$query = $conn->query("SELECT * FROM administrative $searchQuery ORDER BY created_at DESC LIMIT $start, $limit");

$output = '';
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $output .= '<tr>
        <td>' . htmlspecialchars($row['administrative_title']) . '</td>
	    <td>' . htmlspecialchars($row['administrative_project']) . '</td>
            <td class="pdf-cell">';
        if (!empty($row['administrative_pdf'])) {
            $output .= '<a href="../Admin Login/Central Office/Administrative/pdfs_administrative/' . htmlspecialchars($row['administrative_pdf']) . '" target="_blank">
                            <button class="pdf-button">View PDF</button>
                        </a>';
        } else {
            $output .= '<span>No file available</span>';
        }
        $output .= '</td></tr>';
    }
} else {
    $output = '<tr><td colspan="2">No records found.</td></tr>';
}

// Generate pagination buttons
$pagination = '<div class="pagination">';
for ($i = 1; $i <= $totalPages; $i++) {
    $pagination .= '<button class="page-link" data-page="' . $i . '">' . $i . '</button>';
}
$pagination .= '</div>';

echo json_encode(['table' => $output, 'pagination' => $pagination]);
?>
