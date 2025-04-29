<?php
$host = 'localhost';
$dbname = 'library_db';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$limit = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$totalStmt = $conn->query('SELECT COUNT(*) FROM infographics');
$totalInfographics = $totalStmt->fetchColumn();
$totalPages = ceil($totalInfographics / $limit);

$stmt = $conn->prepare('SELECT title_info, pdf_info, custom_title FROM infographics LIMIT :limit OFFSET :offset');
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$infographics = $stmt->fetchAll();

$output = '';
foreach ($infographics as $infographic) {
    $output .= '
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card text-center p-2 shadow-sm">
        <a href="' . $infographic['pdf_info'] . '" target="_blank">
          <img src="' . $infographic['title_info'] . '" class="img-fluid rounded mb-2" style="border: 2px solid #ccc;">
        </a>
        <p class="mb-0">
          <a href="' . $infographic['pdf_info'] . '" target="_blank">
            ' . htmlspecialchars($infographic['custom_title']) . '
          </a>
        </p>
      </div>
    </div>';
}

// Generate pagination buttons
$pagination = '';
if ($totalPages > 1) {
    if ($page > 1) {
        $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . ($page - 1) . '">&laquo;</a></li>';
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        $pagination .= '<li class="page-item ' . ($i == $page ? 'active' : '') . '"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
    }

    if ($page < $totalPages) {
        $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="' . ($page + 1) . '">&raquo;</a></li>';
    }
}

echo json_encode([
    'infographics' => $output,
    'pagination' => $pagination
]);
?>
