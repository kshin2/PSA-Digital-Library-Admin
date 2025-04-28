<?php
include('db_connect.php');

$conn = new mysqli($host, $user, $pass, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title_cif'];
    $pdf = $_FILES['pdf_cif'];

    if ($pdf['type'] === 'application/pdf') {
        $pdfName = time() . "_" . basename($pdf['name']);
        $targetPath = "pdfs_cif/" . $pdfName;

        if (move_uploaded_file($pdf['tmp_name'], $targetPath)) {
            $stmt = $conn->prepare("INSERT INTO cif (title_cif, pdf_cif) VALUES (?, ?)");
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
