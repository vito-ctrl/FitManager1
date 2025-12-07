<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../config/db.php';
    // echo "hi"
    
    $sqlselectcourses = "SELECT * FROM courses";
    $stmt = $conn->query($sqlselectcourses);
    $cours = $stmt->fetch_all(MYSQLI_ASSOC);
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

        nav a:hover {
            color: #0af;
        }

        /* Add Button Centered */
        .addButton {
            display: block;
            width: 120px;
            margin: 20px auto;
            background: #0af;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
        }

        .addButton a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            display: block;
        }

        .addButton:hover {
            background: #0095d9;
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

        .delete-btn {
            background: red;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            padding: 6px 12px;
            color: #fff;
        }

        .edit-btn {
            background: #0af;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            padding: 6px 12px;
            color: #000;
        }

        .edit-btn:hover {
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
            <a href="#">Courses</a>
        </nav>
    </header>

    <h1 style="text-align:center;">Courses</h1>

    <div class="addButton">
        <a href="create.php">Add</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Max Participants</th>
                <th>Delete / Edit</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($cours as $course): ?>
            <tr>
                <td><?= $course['id'] ?></td>
                <td><?= $course['nom'] ?></td>
                <td><?= $course['category'] ?></td>
                <td><?= $course['course_date'] ?></td>
                <td><?= $course['course_time'] ?></td>
                <td><?= $course['duration'] ?></td>
                <td><?= $course['max_participants'] ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $course['id'] ?>">
                        <button id="delete-btn" type="submit">Delete</button>
                    </form>
                    <button class="edit-btn">edit</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
