<?php
require 'db_connect.php'; // Adjust this if your DB connection file has a different name

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Optional: Fetch file to delete it from the server too
    $getFile = $conn->prepare("SELECT pdf_wam FROM wam WHERE id = ?");
    $getFile->bind_param("i", $id);
    $getFile->execute();
    $getFile->bind_result($filename);
    $getFile->fetch();
    $getFile->close();

    // Delete the record from the wam table
    $stmt = $conn->prepare("DELETE FROM wam WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete file from server
        $filePath = "pdfs_wam/" . $filename;
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from the server
        }
        echo "Women and Men (WAM) record deleted successfully.";
    } else {
        echo "Failed to delete Women and Men (WAM) record.";
    }

    $stmt->close();
    $conn->close();
}
?>
