<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FitManager Dashboard</title>
    <style>
        body {
            margin: 0;
            background: #000;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        header {
            background: #111;
            padding: 18px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #222;
        }
        header h1 {
            margin: 0;
            color: #0af;
        }
        nav a {
            margin-left: 18px;
            color: #fff;
            text-decoration: none;
            font-size: 17px;
        }
        nav a:hover {
            color: #0af;
        }

        .container {
            padding: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .card {
            background: #111;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #222;
            box-shadow: 0 0 10px #0af3;
            transition: 0.2s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 15px #0af7;
        }

        .card h2 {
            margin: 0 0 10px 0;
            color: #0af;
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            background: #0af;
            color: #000;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn:hover {
            background: #0095d9;
        }

    </style>
</head>
<body>
    <header>
        <h1>FitManager Dashboard</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="equipements/index.php">Equipments</a>
            <a href="cours/index.php">Courses</a>
            <a href="#">Settings</a>
        </nav>
    </header>

    <div class="container">
        <div class="grid">

            <div class="card">
                <h2>Total Courses</h2>
                <p>Number of courses you offer.</p>
                <a href="cours/index.php" class="btn">Manage Courses</a>
            </div>

            <div class="card">
                <h2>Total Equipments</h2>
                <p>Check your gym equipment list.</p>
                <a href="equipements/index.php" class="btn">Manage Equipments</a>
            </div>

            <div class="card">
                <h2>Today's Schedule</h2>
                <p>Quick view of today's classes.</p>
                <a href="cours/index.php" class="btn">View Schedule</a>
            </div>

            <div class="card">
                <h2>Statistics</h2>
                <p>Participation, popular courses, equipment status.</p>
                <a href="#" class="btn">View Stats</a>
            </div>

        </div>
    </div>
</body>
</html>
