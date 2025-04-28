<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Auto-logout after 30 minutes of inactivity
if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: admin_login.php");
    exit();
}
$_SESSION["last_activity"] = time(); // Update last activity timestamp
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infographics</title>
    <link rel="stylesheet" href="infostyles.css">
    <script src="info-script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="/img/psa logo.png">
</head>
<body>
    <!--SIDE BAR -->
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name"><a href="/Admin Login/index.php"></a>
            PSA Digital Library</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="/Admin Login/index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="/Admin Login/Records/indexrecord.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Records</span>
                </a>
                <span class="tooltip">Records</span>
            </li>
            <li class="dropdown">
            <a href="#">
                <i class='bx bx-receipt'></i>
                <span class="links_name">NCR V</span>
                <i class='bx bxs-chevron-right chevron-icon' ></i>
            </a>
            <span class="tooltip">NCR V</span>

            <!-- Dropdown Content -->
            <ul class="dropdown-content">
                <li><a href="/Admin Login/Infographics/infographics_index.php">Infographics</a></li>
                <li><a href="/Admin Login/Special Releases/sp_index.php">Special Releases</a></li>
                <li><a href="/Admin Login/Women and Men/wam_index.php">Women and Men</a></li>
                <li><a href="/Admin Login/Country in Figures/cif_index.php">Countryside in Figures</a></li>
                <li><a href="/Admin Login/Public Used Files/puf_index.php">Public Used Files</a></li>
            </ul>
            </li>
            <li class="central-office">
                <a href="#">
                    <i class='bx bxs-business'></i>
                    <span class="links_name">Central Office</span>
                    <i class='bx bxs-chevron-right chevron-icon' ></i>
                </a>
                <span class="tooltip">Central Office</span>

                            <ul class="dropdown-co">
                <li class="category-item">
                    <a href="/Admin Login/Central Office/Household/household_index.php">Household</a>
                    <ul class="subcategory-list">
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=Labor+Force+Survey+(LFS)">Labor Force Survey (LFS)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=Functional+Literacy,+Education+and+Mass+Media+Survey+(FLEMMS)">Functional Literacy, Education and Mass Media Survey (FLEMMS)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=Family+Income+and+Expenditure+Survey+(FIES)">Family Income and Expenditure Survey (FIES)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=Consumer+Expectations+Survey+(CES)">Consumer Expectations Survey (CES)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=National+Information+and+Communications+Technology+Household+Survey+(NICTHS)">National Information and Communications Technology Household Survey (NICTHS)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=Household+Energy+Consumption+Survey+(HECS)">Household Energy Consumption Survey (HECS)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=Household+Survey+on+Domestic+Visitors+(HSDV)">Household Survey on Domestic Visitors (HSDV)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=National+Demographic+and+Health+Survey+(NDHS)">National Demographic and Health Survey (NDHS)</a></li>
                        <li><a href="/Admin Login/Central Office/Household/household_index.php?project=National+Migration+Survey+(NMS)">National Migration Survey (NMS)</a></li>
                    </ul>
                </li>

                <li class="category-item">
                <a href="/Admin Login/Central Office/Establishment/establishment_index.php">Establishment</a>
                    <ul class="subcategory-list">
                        <li><a href="../Establishment/establishment_index.php?project=Census+of+Philippine+Business+and+Industry+(CPBI)">Census of Philippine Business and Industry (CPBI)</a></li>
                        <li><a href="../Establishment/establishment_index.php?project=Annual+Survey+of+Philippine+Business+and+Industry+(ASPBI)">Annual Survey of Philippine Business and Industry (ASPBI)</a></li>
                        <li><a href="../Establishment/establishment_index.php?project=Provincial+Product+Accounting+(PPA)">Provincial Product Accounting (PPA)</a></li>
                    </ul>
                </li>

                <li class="category-item">
                    <a href="/Admin Login/Central Office/Administrative/administrative_index.php">Administrative</a>
                    <ul class="subcategory-list">
                        <li><a href="/Admin Login/Central Office/Administrative/administrative_index.php?project=Approved+Building+Permits">Approved Building Permits</a></li>
                    </ul>
                </li>

                <li class="category-item">
                    <a href="/Admin Login/Central Office/Civil Registration/civil_index.php">Civil Registration</a>
                </li>
            </ul>
          </li>  
            <li class="profile">
                <div class="profile-details">
            <img src="/img/psa logo.png" class="logo-details">
                    <div class="name_job">
                        <div class="name"><?php echo htmlspecialchars($_SESSION["admins"]); ?></div>
                        <div class="job">Administrator</div>
                    </div>
                </div>
                <a href="/Admin Login/logout.php">
                <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </li>
        </ul>
    </div>

  <section class="record-layout">
    <div class="text"><i class='bx bx-info-square' ></i>Infographics</div>
  
  <div class="search-container">
    <div class="left-side">
        <!-- Button to trigger the modal -->
    <button id="openModalBtn" class="add-button">Add PDF</button>

    <!-- Modal Structure -->
    <div id="infographicsModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Upload Infographics</h2>
        <form id="uploadForm" enctype="multipart/form-data">
        <input class="input_title" type="text" name="title_info" placeholder="Enter Title" required><br><br>
        <input class="input_file" type="file" name="pdf_info" accept="application/pdf" required><br><br>
        <button type="submit" class="uploadbtn">Upload PDF</button>
        </form>
    </div>
    </div>

    </div>
    <div class="right-side">
      <i class='bx bx-search'></i>
      <input type="text" id="searchInput" placeholder="Search for infographics..." class="input-search">
      <button id="clearSearch" class="record-button">Clear</button>
    </div>
</div>
  <table id="recordsTable" class="table-fill" >
    <thead class="thead-fill">
      <tr>
        <th style="width: 80%;"><i class='bx bxs-detail'></i> Title</th>
        <th style="width: 10%;"><i class='bx bxs-file-pdf'></i> PDF File</th>
        <th style="width: 10%;"><i class='bx bx-dots-horizontal'></i> Action</th>
      </tr>
    </thead>
    <tbody id=infoTable class="table-hover">
      <!-- Records will be populated here via AJAX -->
    </tbody>
  </table>

  <div class="paginations" id="pagination" style="margin-top: 20px;">
    <button id="prevPage" class="record-button">Previous</button>
    <span id="pageInfo">Page 1</span>
    <button id="nextPage" class="record-button">Next</button>
  </div>
    <!-- Edit Modal -->
    <div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn edit-close">&times;</span>
        <h2>Edit Infographic</h2>
        <form id="editForm" enctype="multipart/form-data">
        <input type="hidden" name="id" id="editId">
        <input type="text" name="title" id="editTitle" class="input_title" required><br><br>
        <label>Current File: <a id="currentFileLink" href="#" target="_blank">View PDF</a></label><br><br>
        <input type="file" name="new_pdf" accept="application/pdf"><br><br>
        <button type="submit" class="uploadbtn">Update</button>
        </form>
    </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close-btn delete-close">&times;</span>
        <h2>Are you sure to delete this?</h2><br>
        <button id="confirmDeleteBtn" class="record-button" style="background-color: red;">Delete</button>
    </div>
    </div>

</section>
<script>
  $(document).ready(function() {
    const apiEndpoint = "fetch_info.php"; // PHP file fetching infographics
    const recordsPerPage = 10; // Number of infographics per page
    let currentPage = 1;
    let totalPages = 1;
    let infographics = [];
    let filteredInfographics = []; // Holds filtered results
  
    // Fetch infographics from the API
    function loadInfographics() {
      $.ajax({
        url: apiEndpoint,
        method: "GET",
        dataType: "json",
        success: function(data) {
          $('#status').hide(); // Hide loading or error status
    
          // If no infographics are found
          if (data.length === 0) {
            $('#recordsTable tbody').append('<tr><td colspan="6">No infographics found.</td></tr>');
            return;
          }
    
          // Initialize infographics and filtered infographics
          infographics = data;
          filteredInfographics = [...infographics]; // Start with all infographics
    
          // Update pagination
          updatePagination();
          loadTablePage(currentPage);
        },
        error: function() {
          $('#status').text("Failed to load infographics.");
        }
      });
    }
  
    // Function to load the current page of infographics into the table
    function loadTablePage(page) {
      let start = (page - 1) * recordsPerPage;
      let end = start + recordsPerPage;
      let paginatedInfographics = filteredInfographics.slice(start, end);
  
      let tbody = $('#recordsTable tbody');
      tbody.fadeOut(200, function () {
        tbody.empty();
  
        // Append rows for the current page
        paginatedInfographics.forEach(infographic => {
                    tbody.append(`
        <tr class="total-infographics">
            <td>${infographic.title_info}</td>
            <td><a href='pdfs/${encodeURIComponent(infographic.pdf_info)}' target='_blank'>View PDF</a></td>
            <td>
            <div class="modify-container">
                <button class="record-button modify-btn">Modify</button>
                <div class="modify-options">
                <button class="edit-btn" data-id="${infographic.id}" data-title="${infographic.title_info}" data-file="${encodeURIComponent(infographic.pdf_info)}"><i class='bx bx-edit'></i> Edit</button>
                <button class="delete-btn" data-id="${infographic.id}"><i class='bx bx-trash' ></i> Delete</button>
                </div>
            </div>
            </td>
        </tr>
        `);
        });
  
        // Update page info
        $('#pageInfo').text(`Page ${currentPage} of ${totalPages}`);
  
        // Fade in the table body
        tbody.fadeIn(650);
      });
    }
  
    // Update pagination buttons
    function updatePagination() {
      totalPages = Math.ceil(filteredInfographics.length / recordsPerPage);
      $('#prevPage').prop('disabled', currentPage === 1);
      $('#nextPage').prop('disabled', currentPage === totalPages);
    }
  
    // Function to filter infographics based on search input
    function searchInfographics() {
      let searchTerm = $('#searchInput').val().toLowerCase();
  
      filteredInfographics = infographics.filter(infographic =>
        infographic.title_info.toLowerCase().includes(searchTerm) ||
        infographic.pdf_info.toLowerCase().includes(searchTerm)
      );
  
      currentPage = 1; // Reset to first page after search
      updatePagination();
      loadTablePage(currentPage);
    }
  
    // Pagination button functionality
    $('#prevPage').click(function() {
      if (currentPage > 1) {
        currentPage--;
        loadTablePage(currentPage);
        updatePagination();
      }
    });
  
    $('#nextPage').click(function() {
      if (currentPage < totalPages) {
        currentPage++;
        loadTablePage(currentPage);
        updatePagination();
      }
    });
  
    // Search functionality (on keyup)
    $('#searchInput').on('keyup', function() {
      searchInfographics();
    });
  
    // Clear search functionality
    $('#clearSearch').click(function() {
      $('#searchInput').val('');
      filteredInfographics = [...infographics];
      currentPage = 1;
      updatePagination();
      loadTablePage(currentPage);
    });
  
    // Handle form submission and upload
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      fetch('upload_info.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        alert(data);
        loadInfographics(); // Refresh the table after upload
        this.reset();
      })
      .catch(err => console.error(err));
    });

        let deleteId = null;

    // Show edit modal
    $(document).on("click", ".edit-btn", function() {
    const id = $(this).data("id");
    const title = $(this).data("title");
    const file = $(this).data("file");

    $("#editId").val(id);
    $("#editTitle").val(title);
    $("#currentFileLink").attr("href", `pdfs/${file}`);

    $("#editModal").fadeIn();
    });

    // Submit edit form
    $("#editForm").submit(function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: "update_info.php",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
        alert(response);
        $("#editModal").fadeOut();
        loadInfographics();
        }
    });
    });

    // Show delete modal
    $(document).on("click", ".delete-btn", function() {
    deleteId = $(this).data("id");
    $("#deleteModal").fadeIn();
    });

    // Confirm delete
    $("#confirmDeleteBtn").click(function() {
    $.post("delete_info.php", { id: deleteId }, function(response) {
        alert(response);
        $("#deleteModal").fadeOut();
        loadInfographics();
    });
    });

    // Close modals
    $(".close-btn").click(function() {
    $(".modal").fadeOut();
    });



    // Load infographics on page load
    loadInfographics();
  });
</script>



</body>
</html>
