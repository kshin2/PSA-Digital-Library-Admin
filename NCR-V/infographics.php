<?php
include('../navbar.php');


// DB connection
$host = 'localhost';
$dbname = 'library_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // PAGINATION SETTINGS
    $limit = 8; // Infographics per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // COUNT TOTAL INFOGRAPHICS
    $totalStmt = $conn->query('SELECT COUNT(*) FROM infographics');
    $totalInfographics = $totalStmt->fetchColumn();
    $totalPages = ceil($totalInfographics / $limit);

    // FETCH INFOGRAPHICS FOR CURRENT PAGE
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 8;
    $offset = ($page - 1) * $limit;
    
    // Count total filtered results
    $countSql = 'SELECT COUNT(*) FROM infographics WHERE custom_title LIKE :searchTerm';
    $countStmt = $conn->prepare($countSql);
    $countStmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $countStmt->execute();
    $totalInfographics = $countStmt->fetchColumn();
    $totalPages = ceil($totalInfographics / $limit);
    
    // Fetch paginated filtered results
    $sql = 'SELECT title_info, pdf_info, custom_title FROM infographics WHERE custom_title LIKE :searchTerm ORDER BY id DESC LIMIT :limit OFFSET :offset';
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
</head>
<body>

<div class="container infographics-container">
  <!-- Header Row -->
  <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <h1 class="infographics-title m-0">INFOGRAPHICS</h1>
    <div class="search-bar d-flex">
      <input type="text" id="search-input" value="<?= htmlspecialchars($searchTerm) ?>" placeholder="Search..." class="form-control">
      <button id="search-btn"><i class='bx bx-search'></i></button>
    </div>

  </div>
<!--Script for search-->


<!-- Grid Layout for Infographics -->
<div class="row g-4 fade-in" id="infographic-container">
  <?php foreach ($infographics as $infographic): ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 infographic-card" data-title="<?= strtolower(htmlspecialchars($infographic['custom_title'])) ?>">
      <div class="card text-center p-2 shadow-sm">
        <a href="<?= $infographic['pdf_info'] ?>" target="_blank">
          <img src="<?= $infographic['title_info'] ?>" alt="Infographic" class="img-fluid rounded mb-2" style="border: 2px solid #ccc;">
        </a>
        <p class="mb-0">
          <a href="<?= $infographic['pdf_info'] ?>" target="_blank">
            <?= htmlspecialchars($infographic['custom_title']) ?>
            <p id="no-results" class="text-center mt-4 d-none">No infographics found.</p>

          </a>
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
          <a class="page-link" href="?page=<?= $page - 1 ?>" data-page="<?= $page - 1 ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
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
          <a class="page-link" href="?page=<?= $page + 1 ?>" data-page="<?= $page + 1 ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>
<?php include ('../footer.php'); ?>

<!-- Add JavaScript code here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--<script>
  $(document).ready(function () {
    // Search filter
    $('#search-input').on('input', function () {
      const searchTerm = $(this).val().toLowerCase();
      let anyVisible = false;

      $('.infographic-card').each(function () {
        const title = $(this).data('title');
        const isMatch = title.includes(searchTerm);
        $(this).toggle(isMatch);
        if (isMatch) anyVisible = true;
      });

      $('#no-results').toggleClass('d-none', anyVisible);
    });


    // Allow Enter key to trigger the search
    $('#search-input').on('keypress', function (e) {
      if (e.which === 13) {
        $('#search-btn').click();
      }
    });
  });
</script>-->
<script>
$(document).ready(function () {
  function loadPage(page = 1, search = '') {
    $.ajax({
        url: 'infographics.php',
        type: 'GET',
        data: { page: page, search: search },
        success: function (response) {
            const newContent = $(response).find('#infographic-container').html();
            const newPagination = $(response).find('#pagination-container').html();

            // Add fade effect
            $('#infographic-container').fadeOut(200, function () {
                $(this).html(newContent).fadeIn(200).addClass('fade-in');
            });

            $('#pagination-container').html(newPagination);
        }
    });
  }


    // Live search on input
    $('#search-input').on('input', function () {
        const search = $(this).val();
        loadPage(1, search); // Always start from page 1 when typing
    });

    // Handle pagination click
    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        const page = $(this).data('page');
        const search = $('#search-input').val();
        loadPage(page, search);
        history.pushState({}, '', `?page=${page}&search=${search}`);
    });

    // Optional: Search button trigger
    $('#search-btn').on('click', function () {
        const search = $('#search-input').val();
        loadPage(1, search);
    });
});
</script>

</body>
</html>
