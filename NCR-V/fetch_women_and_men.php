<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";
$conn = new mysqli($host, $username, $password, $database);

$limit = 8;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$start = ($page - 1) * $limit;
$queryStr = isset($_POST['query']) ? $conn->real_escape_string($_POST['query']) : '';

// Apply search if needed
$searchQuery = $queryStr ? "WHERE title_wam LIKE '%$queryStr%'" : "";

// Get total filtered records
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM wam $searchQuery");
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Get paginated filtered records
$query = $conn->query("SELECT * FROM wam $searchQuery ORDER BY created_at DESC LIMIT $start, $limit");

$output = '';
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $output .= '<tr>
            <td>' . htmlspecialchars($row['title_wam']) . '</td>
            <td class="pdf-cell">';
        if (!empty($row['pdf_wam'])) {
            $output .= '<a href="../Admin Login/Women and Men/pdfs_wam/' . htmlspecialchars($row['pdf_wam']) . '" target="_blank">
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
