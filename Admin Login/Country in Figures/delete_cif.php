<?php
require 'db_connect.php'; // Adjust this if your DB connection file has a different name

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Optional: Fetch file to delete it from the server too
    $getFile = $conn->prepare("SELECT pdf_cif FROM cif WHERE id = ?");
    $getFile->bind_param("i", $id);
    $getFile->execute();
    $getFile->bind_result($filename);
    $getFile->fetch();
    $getFile->close();

    // Delete the record from the wam table
    $stmt = $conn->prepare("DELETE FROM cif WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete file from server
        $filePath = "pdfs_cif/" . $filename;
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from the server
        }
        echo "Countryside in Figures (CIF) record deleted successfully.";
    } else {
        echo "Failed to delete Countryside in Figures (CIF) record.";
    }

    $stmt->close();
    $conn->close();
}
?>
