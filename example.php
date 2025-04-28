<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Records Viewer</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    }
    body{
      background-color: #e4e9f7;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: .5px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    /* Table Styling */
    .table-fill {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }
    .table-fill thead {
        background-color: #1e6fc2;
        color: white;
        padding: 12px;
        border: .5px solid #ddd;
        text-align: left;
    }
    .table-fill td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
        background-color: #f9f9f9;
    }

    /* Hover Effect */
    .table-fill tbody tr:hover td {
        background-color: #5393E3;
        color: white;
    }
    .paginations{
     text-align: center;
    }
   
    .search-container {
      display: flex;
      justify-content: space-between; /* Spread left and right */
      align-items: center;
      flex-wrap: wrap; /* Optional: helps on small screens */
      margin-bottom: 10px;
      gap: 10px;
    }
    .left-side {
      flex: 1;
    }
    .total-record{
      margin-top: 5px;
      font-weight: bold;
      text-align: left;
    }
    .right-side {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .search-container i {
      align-items: center;
      display: flex;
    }

    #searchInput {
      padding: 5px;
      width: 200px;
      margin-right: 5px; /* Space between input and button */
    }
    .input-search {
      border: 1.5px solid transparent;
      width: 15em;
      height: 35px;
      padding-left: 0.8em;
      outline: none;
      overflow: hidden;
      background-color: #f3f3f3;
      border-radius: 5px;
      transition: all 0.5s;
    }

    .input-search:hover,
    .input-search:focus {
      border: 2px solid #4a9dec;
      box-shadow: 0px 0px 0px 2px rgb(74, 157, 236, 20%);
      background-color: white;
    }
    #clearSearch {
      padding: 5px 10px;
      cursor: pointer;
    }
    .record-button {
    background-color: #1e6fc2;
    color: #f3f7fe;
    border: none;
    cursor: pointer;
    border-radius: 3px;
    width: 80px;
    height: 35px;
    transition: 0.3s;
  }
  .record-button:hover {
    background-color: #f3f7fe;
    box-shadow: 0 0 0 2px #3b83f65f;
    color: #1e6fc2;
  }

  </style>
</head>
<body>

  <h2>Records</h2>

  <div id="status" class="loading">Loading records...</div>
  
  <div class="search-container">
    <div class="left-side">
      <div id="totalCount" class="total-record"></div>
    </div>
    <div class="right-side">
      <i class='bx bx-search'></i>
      <input type="text" id="searchInput" placeholder="Search for students..." class="input-search">
      <button id="clearSearch" class="record-button">Clear</button>
    </div>
</div>
  <table id="recordsTable" class="table-fill" >
    <thead class="thead-fill">
      <tr >
        <th>Name</th>
        <th>Age</th>
        <th>Sex</th>
        <th>Grade/Course</th>
        <th>School/Institution</th>
        <th>Purpose</th>
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

  <script>
$(document).ready(function() {
  const apiEndpoint = "fetch.php"; // PHP file fetching records
  const recordsPerPage = 5; // Number of records per page
  let currentPage = 1;
  let totalPages = 1;
  let records = [];
  let filteredRecords = []; // Holds filtered results

  // Fetch records from the API
  $.ajax({
    url: apiEndpoint,
    method: "GET",
    dataType: "json",
    success: function(data) {
      $('#status').hide(); // Hide loading or error status

      // If no records are found
      if (data.length === 0) {
        $('#recordsTable tbody').append('<tr><td colspan="6">No records found.</td></tr>');
        $('#totalCount').text("Total Students: 0");
        return;
      }

      // Initialize records and filtered records
      records = data;
      filteredRecords = [...records]; // Start with all records
      $('#totalCount').text("Total Students: " + records.length);

      // Update pagination
      updatePagination();
      loadTablePage(currentPage);
    },
    error: function() {
      $('#status').text("Failed to load records.");
      $('#totalCount').text("Total Students: 0");
    }
  });

  // Function to load the current page of records into the table
  function loadTablePage(page) {
    let start = (page - 1) * recordsPerPage;
    let end = start + recordsPerPage;
    let paginatedRecords = filteredRecords.slice(start, end);

    let tbody = $('#recordsTable tbody');
    tbody.fadeOut(200, function () {
      tbody.empty();

      // Append rows for the current page
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

      // Update page info
      $('#pageInfo').text(`Page ${currentPage} of ${totalPages}`);

      // Fade in the table body
      tbody.fadeIn(650);
    });
  }

  // Update pagination buttons and total student count
  function updatePagination() {
    totalPages = Math.ceil(filteredRecords.length / recordsPerPage);
    $('#prevPage').prop('disabled', currentPage === 1);
    $('#nextPage').prop('disabled', currentPage === totalPages);
  }

  // Function to filter records based on search input
  function searchRecords() {
    let searchTerm = $('#searchInput').val().toLowerCase();

    filteredRecords = records.filter(record =>
      record.name.toLowerCase().includes(searchTerm) ||
      record.grade_course.toLowerCase().includes(searchTerm) ||
      record.school.toLowerCase().includes(searchTerm) ||
      record.purpose.toLowerCase().includes(searchTerm)
    );

    currentPage = 1; // Reset to first page after search
    updatePagination();
    loadTablePage(currentPage);
    $('#totalCount').text("Total Students: " + filteredRecords.length);
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
    searchRecords();
  });

  // Clear search functionality
  $('#clearSearch').click(function() {
    $('#searchInput').val('');
    filteredRecords = [...records];
    currentPage = 1;
    updatePagination();
    loadTablePage(currentPage);
    $('#totalCount').text("Total Students: " + filteredRecords.length);
  });

});


  </script>

</body>
</html>
