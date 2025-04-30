<?php
$host = 'localhost';
$dbname = 'library_db';
$username = 'root';
$password = '';

header('Content-Type: text/html; charset=utf-8');

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

    $sql = 'SELECT title_info, pdf_info, custom_title FROM infographics WHERE custom_title LIKE :searchTerm ORDER BY id DESC';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();

    $infographics = $stmt->fetchAll();

    if ($infographics):
        foreach ($infographics as $infographic): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 infographic-card mb-3">
                <div class="card text-center p-2 shadow-sm">
                    <a href="<?= htmlspecialchars($infographic['pdf_info']) ?>" target="_blank">
                        <img src="<?= htmlspecialchars($infographic['title_info']) ?>" alt="Infographic" class="img-fluid rounded mb-2" style="border: 2px solid #ccc;">
                    </a>
                    <p class="mb-0">
                        <a href="<?= htmlspecialchars($infographic['pdf_info']) ?>" target="_blank">
                            <?= htmlspecialchars($infographic['custom_title']) ?>
                        </a>
                    </p>
                </div>
            </div>
        <?php endforeach;
    else:
        echo '<div class="col-12"><p class="text-center">No infographics found.</p></div>';
    endif;

} catch (PDOException $e) {
    echo '<div class="col-12"><p class="text-danger">Database error: ' . htmlspecialchars($e->getMessage()) . '</p></div>';
}
?>
