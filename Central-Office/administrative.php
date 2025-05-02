<?php 
include ('navbar-co.php');

$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";

// Database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM administrative ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrative</title>
    <link rel="icon" href="/Images/PSA-Logo.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="content">
        <h1><span class="text-highlight">ADMINISTRATIVE</span></h1>

        <div class="top-bar">
            <div class="d-flex gap-2 align-items-center flex-wrap">
                <!-- Search Bar -->
                <div class="search-bar d-flex">
                    <input type="text" id="search-input" placeholder="Search..." class="form-control">
                    <button id="search-btn" class="btn btn-outline-secondary"><i class='bx bx-search'></i></button>
                </div>

                <!-- Dropdown Filter -->
                <div class="project-filter">
                    <select id="project-filter" class="form-select">
                        <option value="">All Projects</option>
                        <option value="Approved Building Permits">Approved Building Permits</option>
                    </select>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 70%;">Title</th>
                    <th style="width: 20%;">Project</th>
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
            function loadData(page = 1, query = '', project = '') {
                $('#release-table').fadeOut(200, function () {
                    $.ajax({
                        url: 'fetch_administrative.php',
                        type: 'POST',
                        data: { page: page, query: query, project: project },
                        dataType: 'json',
                        success: function(response) {
                            $('#release-table').html(response.table).fadeIn(200);
                            $('#pagination-container').html(response.pagination);
                        }
                    });
                });
            }

            $(document).ready(function() {
                function applyFilters(page = 1) {
                    const query = $('#search-input').val();
                    const project = $('#project-filter').val();
                    loadData(page, query, project);
                }

                // Check if URL has ?project=
                const urlParams = new URLSearchParams(window.location.search);
                const projectParam = urlParams.get('project');

                if (projectParam) {
                    $('#project-filter').val(projectParam);
                    loadData(1, '', projectParam); // Load data with the specified project
                } else {
                    loadData(); // Default load
                }

                $('#search-input').on('keyup', function () {
                    applyFilters(1);
                });

                $('#project-filter').on('change', function () {
                    applyFilters(1);
                });

                $(document).on('click', '.page-link', function () {
                    const page = $(this).data('page');
                    applyFilters(page);
                });
            });


    </script>

</body>
</html>
