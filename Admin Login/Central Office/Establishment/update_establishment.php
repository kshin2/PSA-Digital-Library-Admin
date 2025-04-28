<?php
require 'db_connect.php'; // Adjust this if your DB connection file has a different name

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $project = $_POST['project']; // Get the selected project

    // Handle file upload if a new file is provided
    if (isset($_FILES['new_pdf']) && $_FILES['new_pdf']['error'] === 0) {
        $fileName = uniqid() . '_' . basename($_FILES["new_pdf"]["name"]);
        $targetDir = "pdfs_establishment/";
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["new_pdf"]["tmp_name"], $targetFilePath)) {
            // Update title, file, and project
            $stmt = $conn->prepare("UPDATE establishment SET establishment_title = ?, establishment_pdf = ?, establishment_project = ? WHERE id = ?");
            $stmt->bind_param("sssi", $title, $fileName, $project, $id);
        } else {
            echo "Failed to upload new file.";
            exit;
        }
    } else {
        // Update only the title and project if no new file is provided
        $stmt = $conn->prepare("UPDATE establishment SET establishment_title = ?, establishment_project = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $project, $id);
    }

    if ($stmt->execute()) {
        echo "Establishment record updated successfully.";
    } else {
        echo "Failed to update establishment record.";
    }

    $stmt->close();
    $conn->close();
}
?>
