<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['household_title'];
    $project = $_POST['household_project'];
    $pdf = $_FILES['household_pdf'];

    if ($pdf['error'] !== UPLOAD_ERR_OK) {
        echo "Upload error: " . $pdf['error'];
        exit;
    }

    if ($pdf['type'] === 'application/pdf') {
        $pdfName = time() . "_" . basename($pdf['name']);
        $targetPath = "pdfs_household/" . $pdfName;

        if (move_uploaded_file($pdf['tmp_name'], $targetPath)) {
            $stmt = $conn->prepare("INSERT INTO household (household_title, household_project, household_pdf) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $project, $pdfName);
            if ($stmt->execute()) {
                echo "PDF uploaded successfully!";
            } else {
                echo "Database error: " . $stmt->error;
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Only PDF files are allowed.";
    }
}

$conn->close();
?>
