<?php
require 'db_connect.php'; // Adjust if necessary

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];

    // Check if a new PDF file is uploaded
    if (isset($_FILES['new_pdf']) && $_FILES['new_pdf']['error'] === 0) {
        $fileName = uniqid() . '_' . basename($_FILES["new_pdf"]["name"]);
        $targetDir = "pdfs_sp/";
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["new_pdf"]["tmp_name"], $targetFilePath)) {
            // Update title and file path
            $stmt = $conn->prepare("UPDATE special_releases SET title_sp = ?, pdf_sp = ? WHERE id = ?");
            $stmt->bind_param("ssi", $title, $fileName, $id);
        } else {
            echo "Failed to upload new file.";
            exit;
        }
    } else {
        // Only update the title
        $stmt = $conn->prepare("UPDATE special_releases SET title_sp = ? WHERE id = ?");
        $stmt->bind_param("si", $title, $id);
    }

    if ($stmt->execute()) {
        echo "Special release updated successfully.";
    } else {
        echo "Failed to update special release.";
    }

    $stmt->close();
    $conn->close();
}
?>
