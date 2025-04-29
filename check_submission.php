<?php
session_start();
if (isset($_SESSION['user_info'])) {
    echo json_encode(["status" => "exists"]);
} else {
    echo json_encode(["status" => "new"]);
}
?>
