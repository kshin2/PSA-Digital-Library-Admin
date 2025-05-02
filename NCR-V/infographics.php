<?php
include('../navbar.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    // Count filtered results
    $countSql = 'SELECT COUNT(*) FROM infographics WHERE title_info LIKE :searchTerm';
    $countStmt = $conn->prepare($countSql);
    $countStmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $countStmt->execute();
    $totalInfographics = $countStmt->fetchColumn();
    $totalPages = ceil($totalInfographics / $limit);

    // Fetch filtered results
    $sql = 'SELECT title_info, pdf_info FROM infographics WHERE title_info LIKE :searchTerm ORDER BY id DESC LIMIT :limit OFFSET :offset';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $infographics = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Infographics - PSA Digital Library</title>
  <link rel="icon" href="../favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container infographics-container">
  <!-- Header Row -->
  <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <h1 class="infographics-title m-0"><span class="text-highlight">INFOGRAPHICS</span></h1>
    <div class="search-bar d-flex">
      <input type="text" id="search-input" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Search..." class="form-control">
      <button id="search-btn"><i class='bx bx-search'></i></button>
    </div>
  </div>

  <!-- Grid Layout for Infographics -->
  <div id="infographic-container" class="row g-4 fade-in">
    <?php foreach ($infographics as $infographic): ?>
      <?php 
        $pdfPath = "../Admin Login/Infographics/pdfs/" . htmlspecialchars($infographic['pdf_info']);
        $safeTitle = htmlspecialchars($infographic['title_info']);
      ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 infographic-card" data-title="<?= strtolower($safeTitle) ?>">
        <div class="card text-center p-2 shadow-sm">
          <a href="../Admin Login/Infographics/pdfs/<?= htmlspecialchars($infographic['pdf_info']) ?>" target="_blank">
            <canvas class="pdf-thumbnail mb-2" data-pdf="../Admin Login/Infographics/pdfs/<?= htmlspecialchars($infographic['pdf_info']) ?>" style="width:100%; border:2px solid #ccc;"></canvas>
          </a>
          <p class="mb-0">
            <a href="<?= $pdfPath ?>" target="_blank"><?= $safeTitle ?></a>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Pagination -->
  <nav aria-label="Infographic page navigation" class="mt-5">
    <ul class="pagination justify-content-center" id="pagination-container">
      <?php if ($page > 1): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= urlencode($searchTerm) ?>" data-page="<?= $page - 1 ?>">
            &laquo;
          </a>
        </li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($searchTerm) ?>" data-page="<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($page < $totalPages): ?>
        <li class="page-item">
          <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= urlencode($searchTerm) ?>" data-page="<?= $page + 1 ?>">
            &raquo;
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>

<?php include('../footer.php'); ?>

<script>
  function renderPdfThumbnails() {
    const canvases = document.querySelectorAll(".pdf-thumbnail");

    canvases.forEach(canvas => {
      const pdfUrl = canvas.getAttribute("data-pdf");
      const context = canvas.getContext('2d');

      pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
        return pdf.getPage(1);
      }).then(page => {
        const scale = 1.5;
        const viewport = page.getViewport({ scale });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        return page.render({ canvasContext: context, viewport }).promise;
      }).catch(error => {
        console.error("Error rendering PDF:", error);
        context.font = "16px sans-serif";
        context.fillText("Unable to load preview", 10, 50);
      });
    });
  }

  $(document).ready(function () {
    function loadPage(page = 1, search = '') {
      $.ajax({
        url: 'infographics.php',
        type: 'GET',
        data: { page: page, search: search },
        success: function (response) {
          const newContent = $(response).find('#infographic-container').html();
          const newPagination = $(response).find('#pagination-container').html();

          $('#infographic-container').fadeOut(200, function () {
            $(this).html(newContent).fadeIn(200).addClass('fade-in');
            renderPdfThumbnails();
          });

          $('#pagination-container').html(newPagination);
        }
      });
    }

    // Initial load
    renderPdfThumbnails();

    $('#search-input').on('input', function () {
      const search = $(this).val();
      loadPage(1, search);
    });

    $('#search-btn').on('click', function () {
      const search = $('#search-input').val();
      loadPage(1, search);
    });

    $(document).on('click', '.page-link', function (e) {
      e.preventDefault();
      const page = $(this).data('page');
      const search = $('#search-input').val();
      loadPage(page, search);
      history.pushState({}, '', `?page=${page}&search=${encodeURIComponent(search)}`);
    });
  });
</script>

</body>
</html>
