<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Get data safely
    $id = intval($_POST['id']);
    $nom = $_POST['nom'];
    $category = $_POST['category'];
    $course_date = $_POST['course_date'];
    $course_time = $_POST['course_time'];
    $duration = intval($_POST['duration']);
    $max_participants = intval($_POST['max_participants']);

    // 2. Prepare update statement
    $stmt = $conn->prepare("
        UPDATE courses 
        SET nom = ?, category = ?, course_date = ?, course_time = ?, duration = ?, max_participants = ?
        WHERE id = ?
    ");

    // 3. Bind values (s = string, i = integer)
    $stmt->bind_param(
        "ssssiii",
        $nom,
        $category,
        $course_date,
        $course_time,
        $duration,
        $max_participants,
        $id
    );

    // 4. Execute
    if ($stmt->execute()) {
        header("Location: index.php?edit=success"); // redirect back
        exit;
    } else {
        echo "Error updating course: " . $stmt->error;
    }
}
?>
