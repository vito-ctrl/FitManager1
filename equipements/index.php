<?php

    require '../config/db.php';

    $sqlselectequipments = "SELECT * FROM equipments";
    $stml = $conn->query($sqlselectequipments);
    $equipments = $stml->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitManager</title>

    <style>
        body {
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background:#111;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #222;
        }

        header h2 {
            margin: 0;
            color: #0af;
        }

        nav a {
            color: #fff;
            margin-left: 20px;
            text-decoration: none;
            font-size: 18px;
        }

        .addButton{
            display: flex;
            justify-content: center;
            background: #0af;
            width: 90px;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        nav a:hover {
            color: #0af;
        }

        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            background: #111;
        }

        th, td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #0af;
            color: #000;
        }

        tr:nth-child(even) {
            background: #1a1a1a;
        }

        .delete-btn{
            background: red;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }

        .edit-btn{
            background: #0af;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }
    </style>
</head>
<body>

    <header>
        <h2>FitManager</h2>
        <nav>
            <a href="../dashboard.php">Dashboard</a>
            <a href="../equipements/index.php">Equipments</a>
            <a href="../cours/index.php">Courses</a>
        </nav>
    </header>

    <h1 style="text-align:center;">equipements</h1>
    <button class='addButton'><a href="./create.php">add</a></button> 

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>delete / edit</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($equipments as $equipment): ?>
            <tr>
                <td><?= $equipment['id'] ?></td>
                <td><?= $equipment['name'] ?></td>
                <td><?= $equipment['type'] ?></td>
                <td><?= $equipment['quantity'] ?></td>
                <td><?= $equipment['status'] ?></td>
                <td>
                    <button class='delete-btn'>
                        delete</button> 
                    <button class='edit-btn'>edit</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
