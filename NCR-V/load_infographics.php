<?php
$host = 'localhost';
$dbname = 'library_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $limit = 8;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $searchParam = '%' . $search . '%';

    // Count total records with search filter
    $countSql = "SELECT COUNT(*) FROM infographics WHERE title_info LIKE :search";
    $countStmt = $conn->prepare($countSql);
    $countStmt->bindValue(':search', $searchParam, PDO::PARAM_STR);
    $countStmt->execute();
    $totalInfographics = $countStmt->fetchColumn();
    $totalPages = ceil($totalInfographics / $limit);

    // Fetch paginated results
    $sql = "SELECT title_info, pdf_info FROM infographics WHERE title_info LIKE :search ORDER BY id DESC LIMIT :limit OFFSET :offset";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search', $searchParam, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $infographics = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Database Error: " . $e->getMessage() . "</div>";
    exit;
}
?>

<!-- Infographic Cards -->
<div id="infographic-container" class="row g-4 fade-in">
  <?php if (count($infographics) > 0): ?>
    <?php foreach ($infographics as $infographic): ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 infographic-card" data-title="<?= strtolower(htmlspecialchars($infographic['title_info'])) ?>">
        <div class="card text-center p-2 shadow-sm">
          <canvas class="pdf-thumbnail mb-2" data-pdf="../Admin Login/Infographics/pdfs/<?= htmlspecialchars($infographic['pdf_info']) ?>" style="width:100%; border:2px solid #ccc;"></canvas>
          <p class="mb-0">
            <a href="<?= htmlspecialchars($infographic['pdf_info']) ?>" target="_blank">
              <?= htmlspecialchars($infographic['title_info']) ?>
            </a>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="col-12">
      <div class="alert alert-warning text-center">No infographics found.</div>
    </div>
  <?php endif; ?>
</div>

<!-- Pagination -->
<nav aria-label="Infographic page navigation" class="mt-5">
  <ul class="pagination justify-content-center" id="pagination-container">
    <?php if ($page > 1): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>" data-page="<?= $page - 1 ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" data-page="<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
      <li class="page-item">
        <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>" data-page="<?= $page + 1 ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</nav>
