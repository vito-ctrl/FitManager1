<?php
require "./config/db.php";
// require "./cours/"

$sqlselectcourses = "SELECT * FROM courses";
$stmt = $conn->query($sqlselectcourses);
$cours = $stmt->fetch_all(MYSQLI_ASSOC);

$sqlselectequipments = "SELECT * FROM equipments";
$stml = $conn->query($sqlselectequipments);
$equipments = $stml->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courses List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h2>Courses List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Date</th>
        <th>Time</th>
        <th>Duration</th>
        <th>Max Participants</th>
    </tr>

    <?php foreach ($cours as $course): ?>
        <tr>
            <td><?= $course['id'] ?></td>
            <td><?= $course['nom'] ?></td>
            <td><?= $course['category'] ?></td>
            <td><?= $course['course_date'] ?></td>
            <td><?= $course['course_time'] ?></td>
            <td><?= $course['duration'] ?></td>
            <td><?= $course['max_participants'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<h2>equipments List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>type</th>
        <th>quantity</th>
        <th>status</th>
    </tr>

    <?php foreach ($equipments as $equipment): ?>
        <tr>
            <td><?= $equipment['id'] ?></td>
            <td><?= $equipment['name'] ?></td>
            <td><?= $equipment['type'] ?></td>
            <td><?= $equipment['quantity'] ?></td>
            <td><?= $equipment['status'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
