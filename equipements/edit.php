<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Get data safely
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = intval($_POST['quantity']);
    $status = $_POST['status'];

    // 2. Prepare update statement
    $stmt = $conn->prepare("
        UPDATE equipments 
        SET name = ?, type = ?, quantity = ?, status = ?
        WHERE id = ?
    ");

    // 3. Bind values (s = string, i = integer)
    $stmt->bind_param(
        "ssisi",
        $name,
        $type,
        $quantity,
        $status,
        $id
    );

    // 4. Execute
    if ($stmt->execute()) {
        header("Location: index.php?edit=success");
        exit;
    } else {
        echo "Error updating equipment: " . $stmt->error;
    }
}
?>
