<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../config/db.php';

if (isset($_POST['action']) && $_POST['action'] === 'add') {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $duration = $_POST['duration'];
        $max_p = $_POST['max_participants'];
        
        
        $sql = "INSERT INTO courses (nom ,category, course_date, course_time, duration, max_participants)
                VALUES ('$name', '$category', '$date', '$time', '$duration', '$max_p')";
        
        $stmt = $conn->query($sql);
        if($stmt === TRUE) echo "nice:)";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>

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

        /* Form Container */
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
        <a href="#">Courses</a>
    </nav>
</header>

<div class="form-container">
    <h1>Add Course</h1>

    <form action="index.php" method="POST">
        <input type="hidden" name="action" value="add">

        <label for="name">Name</label>
        <input type="text" id="name" name="name" required placeholder="Course name">

        <label for="category">Category</label>
        <select id="category" name="category" required>
            <option value="">-- Select Category --</option>
            <option value="Yoga">Yoga</option>
            <option value="Musculation">Musculation</option>
            <option value="Cardio">Cardio</option>
            <option value="CrossFit">CrossFit</option>
            <option value="Pilates">Pilates</option>
        </select>

        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Time</label>
        <input type="time" id="time" name="time" required>

        <label for="duration">Duration (minutes)</label>
        <input type="number" id="duration" name="duration" min="1" required placeholder="Duration">

        <label for="max_participants">Max Participants</label>
        <input type="number" id="max_participants" name="max_participants" min="1" required placeholder="Maximum number">

        <button type="submit">Add Course</button>
    </form>
</div>

</body>
</html>
