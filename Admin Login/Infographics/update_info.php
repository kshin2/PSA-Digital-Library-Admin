<?php
require 'db_connect.php'; // Adjust this if your DB connection file has a different name

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];

    // Handle file upload if a new file is provided
    if (isset($_FILES['new_pdf']) && $_FILES['new_pdf']['error'] === 0) {
        $fileName = uniqid() . '_' . basename($_FILES["new_pdf"]["name"]);
        $targetDir = "pdfs/";
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["new_pdf"]["tmp_name"], $targetFilePath)) {
            // Update title and file
            $stmt = $conn->prepare("UPDATE infographics SET title_info = ?, pdf_info = ? WHERE id = ?");
            $stmt->bind_param("ssi", $title, $fileName, $id);
        } else {
            echo "Failed to upload new file.";
            exit;
        }
    } else {
        // Update only the title
        $stmt = $conn->prepare("UPDATE infographics SET title_info = ? WHERE id = ?");
        $stmt->bind_param("si", $title, $id);
    }

    if ($stmt->execute()) {
        echo "Infographic updated successfully.";
    } else {
        echo "Failed to update infographic.";
    }

    $stmt->close();
    $conn->close();
}
?>
