<?php
    require '../config/db.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']);
        $sql = "DELETE FROM equipments WHERE id = $id";
        $conn->query($sql);

        header("Location: index.php");
        exit;
    }
?>