<?php
session_start();
$_SESSION = [];            // Unset all session variables
session_destroy();          // Destroy the session itself
header("Location: admin_login.php");  // Redirect
exit();
?>
