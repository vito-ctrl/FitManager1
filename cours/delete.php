<?php
    require '../config/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    $sql = "DELETE FROM courses WHERE id = $id";
    $conn->query($sql);

    // reload page so table updates
    header("Location: index.php");
    exit;
}
?>