<?php
session_start();
require "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    $stmt = $conn->prepare("SELECT password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["admins"] = $username;
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
