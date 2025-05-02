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

$sql = "SELECT * FROM civil_registration ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Civil Registraion</title>
    <link rel="icon" href="/Images/PSA-Logo.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="content">
        <h1><span class="text-highlight">CIVIL REGISTRATION</span></h1>

        <div class="top-bar">
            <div class="search-bar d-flex">
                <input type="text" id="search-input" placeholder="Search..." class="form-control">
                <button id="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </div>
 
        <table>
            <thead>
                <tr>
                    <th style="width: 90%;">Title</th>
                    <th style="width: 10%;">PDF File</th>
                </tr>
            </thead>
            <tbody id="release-table">
                <!-- Data will be loaded here via AJAX -->
            </tbody>
        </table>
        <div id="pagination-container" class="mt-3"></div>

    </div>

    <?php include ('../footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadData(page = 1, query = '') {
            $('#release-table').fadeOut(200, function () {
                $.ajax({
                    url: 'fetch_civil_registration.php',
                    type: 'POST',
                    data: { page: page, query: query },
                    dataType: 'json',
                    success: function(response) {
                        $('#release-table').html(response.table).fadeIn(200);
                        $('#pagination-container').html(response.pagination);
                    }
                });
            });
        }

        $(document).ready(function() {
            loadData();

            $('#search-input').on('keyup', function() {
                const query = $(this).val();
                loadData(1, query); // Reset to page 1 on search
            });

            $(document).on('click', '.page-link', function() {
                const page = $(this).data('page');
                const query = $('#search-input').val();
                loadData(page, query);
            });
        });
    </script>

</body>
</html>
