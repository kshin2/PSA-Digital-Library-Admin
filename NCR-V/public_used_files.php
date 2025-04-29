<?php 
include ('../navbar.php');

$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";

// Database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public Used Files</title>
    <link rel="icon" href="/Images/PSA-Logo.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="container">
        <h1 class = "header-puf">Public Used Files</h1>

            <div class="drive-container">
            <div class="drive-header">
            <i class='bx bxl-google-cloud'></i>
            <h2>Google Drive Zip Files</h2>
            </div>

            <iframe 
            src="https://drive.google.com/embeddedfolderview?id=13PIANmsTenRzgwr1SKFzslYjIx_J7Fgi#grid" class="drive-iframe">
            </iframe>   
            </div>
        </div>
    </div>
    <?php include ('../footer.php'); ?>
</body>
</html>
