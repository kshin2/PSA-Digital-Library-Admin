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
    <title>Records</title>
    <link rel="stylesheet" href="recordstyles.css">
    <script src="record-script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="/img/psa logo.png">
</head>
<body>
    <!--SIDE BAR -->
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name"><a href="index.php"></a>
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
                <a href="indexrecord.php">
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
                <li><a href="/Admin Login//Special Releases/sp_index.php">Special Releases</a></li>
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
                        <li><a href="/Admin Login/Central Office/Establishment/establishment_index.php?project=Census+of+Philippine+Business+and+Industry+(CPBI)">Census of Philippine Business and Industry (CPBI)</a></li>
                        <li><a href="/Admin Login/Central Office/Establishment/establishment_index.php?project=Annual+Survey+of+Philippine+Business+and+Industry+(ASPBI)">Annual Survey of Philippine Business and Industry (ASPBI)</a></li>
                        <li><a href="/Admin Login/Central Office/Establishment/establishment_index.php?project=Provincial+Product+Accounting+(PPA)">Provincial Product Accounting (PPA)</a></li>
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
    
    <!--Dashboard Content-->
<section class="record-layout">
    <div class="text"><i class='bx bx-scatter-chart'></i>Records</div>

    <div id="status" class="loading">Loading records...</div>
  
  <div class="search-container">
    <div class="left-side">
      <div id="totalCount" class="total-record"></div>

      <input type="file" id="logoInput" accept="image/*" style="display: none;" />
      <button id="export-pdf" class="record-button">Export PDF</button>
          <select id="date-range-filter">
      <option value="">Date Range Filter</option>
      <option value="last_7_days">Last 7 Days</option>
      <option value="last_14_days">Last 14 Days</option>
      <option value="last_30_days">Last 30 Days</option>
      <option value="this_week">This Week</option>
      <option value="last_week">Last Week</option>
      <option value="this_month">This Month</option>
      <option value="last_month">Last Month</option>
      <option value="this_quarter">This Quarter</option>
      <option value="last_quarter">Last Quarter</option>
      <option value="this_year">This Year</option>
      <option value="custom">Custom</option>
    </select>

    <!-- Optional: custom date range -->
    <div id="custom-date-range" style="display: none;">
      <input type="date" id="start-date"> to
      <input type="date" id="end-date">
      <button id="apply-custom-range" class="record-button">Apply</button>
    </div>

    </div>
    <div class="right-side">
      <i class='bx bx-search'></i>
      <input type="text" id="searchInput" placeholder="Search for records..." class="input-search">
      <button id="clearSearch" class="record-button">Clear</button>
    </div>
</div>
  <table id="recordsTable" class="table-fill" >
    <thead class="thead-fill">
      <tr>
        <th style="width: 25%;">Name</th>
        <th style="width: 5%;">Age</th>
        <th style="width: 5%;">Sex</th>
        <th style="width: 25%;">Grade/Course</th>
        <th style="width: 25%;">School/Institution</th>
        <th style="width: 15%;">Purpose</th>
      </tr>
    </thead>
    <tbody class="table-hover">
      <!-- Records will be populated here via AJAX -->
    </tbody>
  </table>

  <div class="paginations" id="pagination" style="margin-top: 20px;">
    <button id="prevPage" class="record-button">Previous</button>
    <span id="pageInfo">Page 1</span>
    <button id="nextPage" class="record-button">Next</button>
  </div>

</section>

<script>
$(document).ready(function () {
  const apiEndpoint = "fetch.php";
  const recordsPerPage = 10;
  let currentPage = 1;
  let totalPages = 1;
  let records = [];
  let filteredRecords = [];

  // Fetch records
  $.ajax({
    url: apiEndpoint,
    method: "GET",
    dataType: "json",
    success: function (data) {
      $('#status').hide();

      if (data.length === 0) {
        $('#recordsTable tbody').append('<tr><td colspan="6">No records found.</td></tr>');
        $('#totalCount').text("Total Students: 0");
        return;
      }

      records = data;
      filteredRecords = [...records];
      $('#totalCount').text("Total Records: " + records.length);
      updatePagination();
      loadTablePage(currentPage);
    },
    error: function () {
      $('#status').text("Failed to load records.");
      $('#totalCount').text("Total Records: 0");
    }
  });

  // Load records per page
  function loadTablePage(page) {
    let start = (page - 1) * recordsPerPage;
    let end = start + recordsPerPage;
    let paginatedRecords = filteredRecords.slice(start, end);
    let tbody = $('#recordsTable tbody');

    tbody.fadeOut(200, function () {
      tbody.empty();
      paginatedRecords.forEach(record => {
        tbody.append(`
          <tr class="total-records">
            <td>${record.name}</td>
            <td>${record.age}</td>
            <td>${record.sex}</td>
            <td>${record.grade_course}</td>
            <td>${record.school}</td>
            <td>${record.purpose}</td>
          </tr>
        `);
      });

      $('#pageInfo').text(`Page ${currentPage} of ${totalPages}`);
      tbody.fadeIn(650);
    });
  }

  // Update pagination
  function updatePagination() {
    totalPages = Math.ceil(filteredRecords.length / recordsPerPage);
    $('#totalPages').text("Total Pages: " + totalPages);
  }

  // Date filtering
  $('#date-range-filter').on('change', function () {
    const option = $(this).val();
    let startDate = '', endDate = '';
    const today = new Date();
    const now = new Date();

    function formatDate(date) {
      return date.toISOString().split('T')[0];
    }

    switch (option) {
      case 'this_year':
        startDate = `${today.getFullYear()}-01-01`;
        endDate = formatDate(today);
        break;

      case 'last_7_days':
        startDate = formatDate(new Date(today.setDate(today.getDate() - 7)));
        endDate = formatDate(now);
        break;

      case 'last_14_days':
        startDate = formatDate(new Date(today.setDate(today.getDate() - 14)));
        endDate = formatDate(now);
        break;

      case 'last_30_days':
        startDate = formatDate(new Date(today.setDate(today.getDate() - 30)));
        endDate = formatDate(now);
        break;

      case 'this_week': {
        const startOfWeek = new Date(today.setDate(today.getDate() - today.getDay()));
        startDate = formatDate(startOfWeek);
        endDate = formatDate(now);
        break;
      }

      case 'last_week': {
        const lastWeekStart = new Date(today.setDate(today.getDate() - today.getDay() - 7));
        const lastWeekEnd = new Date(lastWeekStart);
        lastWeekEnd.setDate(lastWeekEnd.getDate() + 6);
        startDate = formatDate(lastWeekStart);
        endDate = formatDate(lastWeekEnd);
        break;
      }

      case 'this_month':
        startDate = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-01`;
        endDate = formatDate(now);
        break;

      case 'last_month': {
        const lastMonth = new Date(now.getFullYear(), now.getMonth() - 1, 1);
        startDate = formatDate(lastMonth);
        endDate = formatDate(new Date(now.getFullYear(), now.getMonth(), 0));
        break;
      }

      case 'this_quarter': {
        const quarter = Math.floor((now.getMonth() + 3) / 3);
        const quarterStart = new Date(now.getFullYear(), (quarter - 1) * 3, 1);
        startDate = formatDate(quarterStart);
        endDate = formatDate(now);
        break;
      }

      case 'last_quarter': {
        const quarter = Math.floor((now.getMonth() + 3) / 3) - 1;
        const quarterStart = new Date(now.getFullYear(), (quarter - 1) * 3, 1);
        const quarterEnd = new Date(now.getFullYear(), quarter * 3, 0);
        startDate = formatDate(quarterStart);
        endDate = formatDate(quarterEnd);
        break;
      }

      case 'custom':
        $('#custom-date-range').show();
        return;

      default:
        return;
    }

    $('#custom-date-range').hide();
    filterRecordsByDateRange(startDate, endDate);
  });

  // Apply custom range
  $('#apply-custom-range').on('click', function () {
    const start = $('#start-date').val();
    const end = $('#end-date').val();
    if (start && end) {
      filterRecordsByDateRange(start, end);
    }
  });

// Filter records based on selected date range
function filterRecordsByDateRange(startDate, endDate) {
  const start = new Date(startDate);
  const end = new Date(endDate);
  end.setHours(23, 59, 59, 999); // Include the full end day

  filteredRecords = records.filter(record => {
    const createdAt = new Date(record.created_at);
    return createdAt >= start && createdAt <= end;
  });

  $('#totalCount').text("Total Records: " + filteredRecords.length);
  updatePagination();
  loadTablePage(1); // Load first page of filtered records
}


  // Search function
  function searchRecords() {
    let searchTerm = $('#searchInput').val().toLowerCase();

    filteredRecords = records.filter(record =>
      record.name.toLowerCase().includes(searchTerm) ||
      record.grade_course.toLowerCase().includes(searchTerm) ||
      record.school.toLowerCase().includes(searchTerm) ||
      record.purpose.toLowerCase().includes(searchTerm)
    );

    currentPage = 1;
    updatePagination();
    loadTablePage(currentPage);
    $('#totalCount').text("Total Students: " + filteredRecords.length);
  }

  $('#searchInput').on('keyup', function () {
    searchRecords();
  });

  // Pagination
  $('#prevPage').click(function () {
    if (currentPage > 1) {
      currentPage--;
      loadTablePage(currentPage);
    }
  });

  $('#nextPage').click(function () {
    if (currentPage < totalPages) {
      currentPage++;
      loadTablePage(currentPage);
    }
  });

  document.getElementById('export-pdf').addEventListener('click', function () {
  if (filteredRecords.length === 0) {
    alert("No records to export.");
    return;
  }

  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  // Set font to bold for PSA Digital Library
  doc.setFont('helvetica', 'bold'); // or 'times', 'bold' if you prefer
  doc.setFontSize(14); // Optional: Adjust font size
  doc.text('PHILIPPINE STATISTICS AUTHORITY (NCR PSO V) - DIGITAL LIBRARY', 14, 15);

  // Set font back to normal for the rest of the text
  doc.setFont('helvetica', 'normal');
  doc.setFontSize(12); // Optional: standard size for body
  doc.text('Student Records Report', 14, 25);

  const headers = [['Name', 'Age', 'Sex', 'Grade/Course', 'School', 'Purpose']];
  const rows = filteredRecords.map(record => [
    record.name,
    record.age,
    record.sex,
    record.grade_course,
    record.school,
    record.purpose
  ]);

  doc.autoTable({
    startY: 30,
    head: headers,
    body: rows,
    theme: 'striped'
  });

  doc.save(`Student_Report.pdf`);
});




});
</script>


</body>
</html>
