<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ✅ Correct session check
    if (isset($_SESSION['form_submitted'])) {
        $_SESSION['already_submitted'] = true;
        header("Location: Sample.php");
        exit();

    }

    // 📝 Get form data
    $name = $_POST['name'];
    $grade_course = $_POST['grade_course'];
    $age = (int) $_POST['age']; // Ensure age is an integer
    $school = $_POST['school'];
    $sex = $_POST['sex'];
    $purpose = $_POST['purpose'];

    // ✅ Store in session
    $_SESSION['form_submitted'] = true;
    $_SESSION['user_data'] = [
        'name' => $name,
        'grade_course' => $grade_course,
        'age' => $age,
        'school' => $school,
        'sex' => $sex,
        'purpose' => $purpose
    ];

    // 🔗 Connect to DB
    $conn = new mysqli("localhost", "root", "", "library_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 💾 Insert query
    $stmt = $conn->prepare("INSERT INTO records (name, grade_course, age, school, sex, purpose) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $grade_course, $age, $school, $sex, $purpose);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
