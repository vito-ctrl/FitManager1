<?php
require '../config/db.php';

if (isset($_POST['action']) && $_POST['action'] === 'add') {

    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = intval($_POST['quantity']);
    $status = $_POST['status'];

    $stmt = $conn->prepare("
        INSERT INTO equipments (name, type, quantity, status)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param("ssis", $name, $type, $quantity, $status);

    if ($stmt->execute()) {
        header("Location: index.php?add=success");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Equipment</title>

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

        nav a:hover {
            color: #0af;
        }

        .form-container {
            background: #111;
            width: 450px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #0af3;
            border: 1px solid #222;
        }

        .form-container h1 {
            text-align: center;
            color: #0af;
            margin-bottom: 20px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            background: #000;
            border: 1px solid #333;
            border-radius: 6px;
            color: #fff;
            font-size: 15px;
        }

        select:focus {
            outline: none;
            border-color: #0af;
            box-shadow: 0 0 5px #0af;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #0af;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            background: #000;
            border: 1px solid #333;
            border-radius: 6px;
            color: #fff;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #0af;
            box-shadow: 0 0 5px #0af;
        }

        button {
            width: 100%;
            background: #0af;
            border: none;
            padding: 12px;
            font-size: 16px;
            color: #000;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        button:hover {
            background: #0095d9;
        }
    </style>
</head>
<body>

<header>
    <h2>FitManager</h2>
    <nav>
        <a href="../dashboard.php">Dashboard</a>
        <a href="../equipements/index.php">Equipments</a>
        <a href="../courses/index.php">Courses</a>
    </nav>
</header>

<div class="form-container">
    <h1>Add Equipment</h1>

    <form action="create.php" method="POST">
        <input type="hidden" name="action" value="add">

        <label for="name">Equipment Name</label>
        <input type="text" id="name" name="name" required placeholder="Equipment name">

        <label for="type">Type</label>
        <select id="type" name="type" required>
            <option value="">-- Select Type --</option>
            <option value="Treadmill">Treadmill</option>
            <option value="Dumbbells">Dumbbells</option>
            <option value="Balls">Balls</option>
            <option value="Bicycle">Bicycle</option>
            <option value="Bench">Bench</option>
            <option value="Mat">Mat</option>
            <option value="Other">Other</option>
        </select>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="1" required placeholder="Quantity">

        <label for="status">Status</label>
        <select id="status" name="status" required>
            <option value="">-- Select Status --</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="To replace">To replace</option>
        </select>

        <button type="submit">Add Equipment</button>
    </form>
</div>

</body>
</html>
