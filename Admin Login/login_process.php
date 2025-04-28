<?php
session_start();
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Login successful
            session_regenerate_id(true); // Protect against session fixation attacks
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["admin_username"] = $username;
            $_SESSION["admin_id"] = $admin_id;
            $_SESSION["last_activity"] = time(); // Track last activity for timeout

            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password!'); window.location.href='admin_login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid username or password!'); window.location.href='admin_login.php';</script>";
        exit();
    }
    $stmt->close();
}
$conn->close();
?>
