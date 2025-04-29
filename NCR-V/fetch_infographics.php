<?php
$host = 'localhost';
$dbname = 'library_db';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = 'SELECT title_info, pdf_info, custom_title FROM infographics WHERE custom_title LIKE :searchTerm';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();

    $infographics = $stmt->fetchAll();

    foreach ($infographics as $infographic): ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 infographic-card" data-title="<?= strtolower(htmlspecialchars($infographic['custom_title'])) ?>">
          <div class="card text-center p-2 shadow-sm">
            <a href="<?= $infographic['pdf_info'] ?>" target="_blank">
              <img src="<?= $infographic['title_info'] ?>" alt="Infographic" class="img-fluid rounded mb-2" style="border: 2px solid #ccc;">
            </a>
            <p class="mb-0">
              <a href="<?= $infographic['pdf_info'] ?>" target="_blank">
                <?= htmlspecialchars($infographic['custom_title']) ?>
              </a>
            </p>
          </div>
        </div>
    <?php endforeach;

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<script>

</script>