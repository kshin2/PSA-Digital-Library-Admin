<?php
require 'db_connect.php'; // Adjust this if your DB connection file has a different name

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Optional: Fetch file to delete it from the server too
    $getFile = $conn->prepare("SELECT pdf_sp FROM special_releases WHERE id = ?");
    $getFile->bind_param("i", $id);
    $getFile->execute();
    $getFile->bind_result($filename);
    $getFile->fetch();
    $getFile->close();

    // Delete the record
    $stmt = $conn->prepare("DELETE FROM special_releases WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete file from server
        $filePath = "pdfs_sp/" . $filename;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        echo "Special Release deleted successfully.";
    } else {
        echo "Failed to delete Special Release.";
    }

    $stmt->close();
    $conn->close();
}
?>
