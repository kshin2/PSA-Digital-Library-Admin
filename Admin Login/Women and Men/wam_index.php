<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: /Admin%20Login/admin_login.php");
    exit();
}

// Auto-logout after 30 minutes of inactivity
if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: /Admin%20Login/admin_login.php");
    exit();
}

$_SESSION["last_activity"] = time(); // Update last activity timestamp
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women and Men</title>
    <link rel="stylesheet" href="wamstyles.css">
    <script src="wam_script.js" defer></script>
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
                <a href="">
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
                        <div class="name"><?php echo htmlspecialchars($_SESSION["admin_logged_in"]); ?></div>
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
    <div class="text"><i class='bx bx-male-female' ></i>Women and Men</div>
  
  <div class="search-container">
    <div class="left-side">
        <!-- Button to trigger the modal -->
    <button id="openModalBtn" class="add-button">Add PDF</button>

    <!-- Modal Structure -->
    <div id="infographicsModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Upload Women and Men</h2>
        <form id="uploadForm" enctype="multipart/form-data">
        <input class="input_title" type="text" name="title_wam" placeholder="Enter Title" required><br><br>
        <input class="input_file" type="file" name="pdf_wam" accept="application/pdf" required><br><br>
        <button type="submit" class="uploadbtn">Upload PDF</button>
        </form>
    </div>
    </div>

    </div>
    <div class="right-side">
      <i class='bx bx-search'></i>
      <input type="text" id="searchInput" placeholder="Search for women and men..." class="input-search">
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
    <tbody id=wamTable class="table-hover">
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
        <h2>Edit Women and Men</h2>
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
$(document).ready(function () {
  const apiEndpoint = "fetch_wam.php"; // Change endpoint to fetch_wam.php
  const recordsPerPage = 10;
  let currentPage = 1;
  let totalPages = 1;
  let wam = [];  // Renamed from specialReleases to wam
  let filteredWam = [];  // Renamed from filteredReleases to filteredWam

  function loadWam() {  // Renamed from loadSpecialReleases to loadWam
    $.ajax({
      url: apiEndpoint,
      method: "GET",
      dataType: "json",
      success: function (data) {
        $('#status').hide();

        if (data.length === 0) {
          $('#wamTable tbody').html('<tr><td colspan="6">No Women and Men found.</td></tr>'); // Update table ID to wamTable
          return;
        }

        wam = data;  // Renamed from specialReleases to wam
        filteredWam = [...wam];  // Renamed from filteredReleases to filteredWam
        updatePagination();
        loadTablePage(currentPage);
      },
      error: function () {
        $('#status').text("Failed to load Women and Men.");
      }
    });
  }

  function loadTablePage(page) {
  const start = (page - 1) * recordsPerPage;
  const end = start + recordsPerPage;
  const paginated = filteredWam.slice(start, end);  // Correct reference

  const tbody = $('#wamTable');  // FIXED: just select the tbody directly
  tbody.fadeOut(200, function () {
    tbody.empty();
    paginated.forEach(wamItem => {
      tbody.append(`
        <tr class="total-wam">
          <td>${wamItem.title_wam}</td>
          <td><a href='pdfs_wam/${encodeURIComponent(wamItem.pdf_wam)}' target='_blank'>View PDF</a></td>
          <td>
            <div class="modify-container">
              <button class="record-button modify-btn">Modify</button>
              <div class="modify-options">
                <button class="edit-btn" data-id="${wamItem.id}" data-title="${wamItem.title_wam}" data-file="${encodeURIComponent(wamItem.pdf_wam)}">
                  <i class='bx bx-edit'></i> Edit
                </button>
                <button class="delete-btn" data-id="${wamItem.id}">
                  <i class='bx bx-trash'></i> Delete
                </button>
              </div>
            </div>
          </td>
        </tr>
      `);
    });

    $('#pageInfo').text(`Page ${currentPage} of ${totalPages}`);
    tbody.fadeIn(650);
  });
}


  function updatePagination() {
    totalPages = Math.ceil(filteredWam.length / recordsPerPage);  // Renamed from filteredReleases to filteredWam
    $('#prevPage').prop('disabled', currentPage === 1);
    $('#nextPage').prop('disabled', currentPage === totalPages);
  }

  function searchWam() {
    const searchTerm = $('#searchInput').val().toLowerCase();
    filteredWam = wam.filter(wamItem =>  // Renamed from specialReleases to wam
      wamItem.title_wam.toLowerCase().includes(searchTerm) ||
      wamItem.pdf_wam.toLowerCase().includes(searchTerm)
    );

    currentPage = 1;
    updatePagination();
    loadTablePage(currentPage);
  }

  $('#prevPage').click(function () {
    if (currentPage > 1) {
      currentPage--;
      loadTablePage(currentPage);
      updatePagination();
    }
  });

  $('#nextPage').click(function () {
    if (currentPage < totalPages) {
      currentPage++;
      loadTablePage(currentPage);
      updatePagination();
    }
  });

  $('#searchInput').on('keyup', function () {
    searchWam();  // Renamed from searchReleases to searchWam
  });

  $('#clearSearch').click(function () {
    $('#searchInput').val('');
    filteredWam = [...wam];  // Renamed from filteredReleases to filteredWam
    currentPage = 1;
    updatePagination();
    loadTablePage(currentPage);
  });

  $('#uploadForm').on('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('upload_wam.php', {  // Change URL to upload_wam.php
      method: 'POST',
      body: formData
    })
      .then(res => res.text())
      .then(data => {
        alert(data);
        loadWam();  // Renamed from loadSpecialReleases to loadWam
        this.reset();
      })
      .catch(err => console.error(err));
  });

  let deleteId = null;

  $(document).on("click", ".edit-btn", function () {
    const id = $(this).data("id");
    const title = $(this).data("title");
    const file = $(this).data("file");

    $("#editId").val(id);
    $("#editTitle").val(title);
    $("#currentFileLink").attr("href", `pdfs_wam/${file}`);  // Change path to pdfs_wam

    $("#editModal").fadeIn();
  });

  $("#editForm").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
      url: "update_wam.php",  // Change URL to update_wam.php
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        alert(response);
        $("#editModal").fadeOut();
        loadWam();  // Renamed from loadSpecialReleases to loadWam
      }
    });
  });

  $(document).on("click", ".delete-btn", function () {
    deleteId = $(this).data("id");
    $("#deleteModal").fadeIn();
  });

  $("#confirmDeleteBtn").click(function () {
    $.post("delete_wam.php", { id: deleteId }, function (response) {
      alert(response);
      $("#deleteModal").fadeOut();
      loadWam();  // Renamed from loadSpecialReleases to loadWam
    });
  });

  $(".close-btn").click(function () {
    $(".modal").fadeOut();
  });

  // Initial load
  loadWam();  // Renamed from loadSpecialReleases to loadWam
});

</script>




</body>
</html>
