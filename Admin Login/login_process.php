<?php
session_start();
require "db_connect.php";

// Session Timeout Logic (30 minutes)
$timeout_duration = 1800; // 30 minutes in seconds
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout_duration)) {
    // If the session has been inactive for too long, log out the user
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy session
    header("Location: admin_login.php"); // Redirect to login page
    exit();
}
$_SESSION['last_activity'] = time(); // Update the last activity time

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Prepare statement to fetch admin's hashed password
    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $hashed_password);
        $stmt->fetch();

        // Verify the entered password
        if (password_verify($password, $hashed_password)) {
            // Login successful
            session_regenerate_id(true); // Protect against session fixation attacks
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["admin_username"] = $username;
            $_SESSION["admin_id"] = $admin_id;
            $_SESSION["last_activity"] = time(); // Track last activity for timeout

            // Redirect to the dashboard or main admin page
            header("Location: index.php");
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Invalid username or password!'); window.location.href='admin_login.php';</script>";
            exit();
        }
    } else {
        // Username does not exist
        echo "<script>alert('Invalid username or password!'); window.location.href='admin_login.php';</script>";
        exit();
    }
    $stmt->close();
}
$conn->close();
?>
