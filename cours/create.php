<?php
    require '../config/db.php';
    $sqlcreatecour = "INSERT INTO courses (nom, category, course_date, course_time, duration, max_participants)
    VALUE ('vito', 'Cardio', '2025-4-12', '12:00:00', '40', '10');";

    if($conn->query($sqlcreatecour) === TRUE){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
