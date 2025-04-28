<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Fetch the filename to delete it from the server
    $getFile = $conn->prepare("SELECT administrative_pdf FROM administrative WHERE id = ?");
    $getFile->bind_param("i", $id);
    $getFile->execute();
    $getFile->bind_result($filename);
    $getFile->fetch();
    $getFile->close();

    // Delete the record from the database
    $stmt = $conn->prepare("DELETE FROM administrative WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete the PDF file from the server
        $filePath = "pdfs_administrative/" . $filename;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        echo "Administrative record deleted successfully.";
    } else {
        echo "Failed to delete administrative record.";
    }

    $stmt->close();
    $conn->close();
}
?>
