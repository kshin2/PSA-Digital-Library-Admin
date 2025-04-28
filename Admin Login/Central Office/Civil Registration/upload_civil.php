<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['civil_title']; // Adjusted to match 'civil_title'
    $pdf = $_FILES['civil_pdf']; // Adjusted to match 'civil_pdf'

    if ($pdf['type'] === 'application/pdf') {
        $pdfName = time() . "_" . basename($pdf['name']);
        $targetPath = "pdfs_civil/" . $pdfName; // Adjusted to 'pdfs_civil'

        if (move_uploaded_file($pdf['tmp_name'], $targetPath)) {
            $stmt = $conn->prepare("INSERT INTO civil_registration (civil_title, civil_pdf) VALUES (?, ?)");
            $stmt->bind_param("ss", $title, $pdfName);
            $stmt->execute();
            echo "PDF uploaded successfully!";
        } else {
            echo "Failed to upload PDF.";
        }
    } else {
        echo "Only PDF files are allowed.";
    }
}
?>
