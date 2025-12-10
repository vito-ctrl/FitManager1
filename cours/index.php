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

        /* Modal Background */
.modal {
    display: none;  
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
}

/* Modal Box */
.modal-content {
    background: #111;
    color: #fff;
    /* margin: 12% auto; */
    padding: 25px;
    width: 400px;
    border-radius: 8px;
    border: 1px solid #333;
}

/* Close Button */
.close {
    float: right;
    font-size: 24px;
    cursor: pointer;
}

/* Modal Inputs */
.modal-content input,
.modal-content select {
    width: 100%;
    padding: 8px;
    margin: 10px 0;
    background: #222;
    border: 1px solid #444;
    color: #fff;
    border-radius: 4px;
}

.modal-content button {
    width: 100%;
    padding: 10px;
    background: #0af;
    color: #000;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.modal-content button:hover {
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
                        <button class="delete-btn" type="submit">Delete</button>
                    </form>
                    <button class="edit-btn"
                        onclick="openEditModal(
                            <?= $course['id'] ?>, 
                            '<?= $course['nom'] ?>', 
                            '<?= $course['category'] ?>',
                            '<?= $course['course_date'] ?>',
                            '<?= $course['course_time'] ?>',
                            <?= $course['duration'] ?>,
                            <?= $course['max_participants'] ?>)">
                        Edit
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- POPUP MODAL -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span onclick="closeEditModal()" class="close">&times;</span>

        <h2>Edit Course</h2>

        <form action="edit.php" method="POST">
            <input type="hidden" name="id" id="edit_id">

            <label>Name:</label>
            <input type="text" name="nom" id="edit_nom">

            <label>Category:</label>
            <select name="category" id="edit_category">
                <option value="Yoga">Yoga</option>
                <option value="Musculation">Musculation</option>
                <option value="Cardio">Cardio</option>
                <option value="CrossFit">CrossFit</option>
                <option value="Pilates">Pilates</option>
            </select>

            <label>Date:</label>
            <input type="date" name="course_date" id="edit_course_date">

            <label>Time:</label>
            <input type="time" name="course_time" id="edit_course_time">

            <label>Duration (minutes):</label>
            <input type="number" name="duration" id="edit_duration">

            <label>Max Participants:</label>
            <input type="number" name="max_participants" id="edit_max_participants">

            <button type="submit">Save</button>
        </form>
    </div>
</div>
<script>
    function openEditModal(id, nom, category, course_date, course_time, duration, max_participants) {
        document.getElementById("editModal").style.display = "block";

        document.getElementById("edit_id").value = id;
        document.getElementById("edit_nom").value = nom;
        document.getElementById("edit_category").value = category;
        document.getElementById("edit_course_date").value = course_date;
        document.getElementById("edit_course_time").value = course_time;
        document.getElementById("edit_duration").value = duration;
        document.getElementById("edit_max_participants").value = max_participants;
    }

    function closeEditModal() {
        document.getElementById("editModal").style.display = "none";
    }

</script>


</body>
</html>
