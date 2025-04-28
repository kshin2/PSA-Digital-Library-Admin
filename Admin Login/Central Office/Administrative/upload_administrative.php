<?php
include('db_connect.php');

// Create a connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $title = trim($_POST['administrative_title']);
    $project = trim($_POST['administrative_project']);
    $pdf = $_FILES['administrative_pdf'];

    // Check for upload errors
    if ($pdf['error'] !== UPLOAD_ERR_OK) {
        echo "Upload error: " . $pdf['error'];
        exit;
    }

    // Validate that the file is a PDF
    if ($pdf['type'] !== 'application/pdf') {
        echo "Only PDF files are allowed.";
        exit;
    }

    // Generate a safe name for the PDF file
    $pdfName = time() . "_" . basename($pdf['name']);
    $targetPath = "pdfs_administrative/" . $pdfName;

    // Check if the target directory exists and is writable
    if (!is_dir('pdfs_administrative')) {
        mkdir('pdfs_administrative', 0777, true);  // Create directory if it doesn't exist
    }

    if (!is_writable('pdfs_administrative')) {
        echo "Upload directory is not writable.";
        exit;
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($pdf['tmp_name'], $targetPath)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO administrative (administrative_title, administrative_project, administrative_pdf) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $project, $pdfName);

        // Execute the query and check for errors
        if ($stmt->execute()) {
            echo "PDF uploaded successfully!";
        } else {
            echo "Database error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Failed to move uploaded file.";
    }
}

// Close the database connection
$conn->close();
?>
