CREATE DTABASE FitManager;

USE FitManager;

CREATE TABLE courses(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    category ENUM('Yoga', 'Musculation', 'Cardio', 'CrossFit', 'Pilates') NOT NULL,
    course_date DATE NOT NULL,
    course_time TIME NOT NULL,
    duration INT NOT NULL CHECK (duration > 0),
    max_participants INT NOT NULL CHECK (max_participants > 0),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO courses (nom, category, course_date, course_time, duration, max_participants) 
VALUES ('Morning Yoga', 'Yoga', '2025-12-05', '08:00:00', 60, 20),
('Strength Training', 'Musculation', '2025-12-06', '10:30:00', 90, 15),
('Cardio Blast', 'Cardio', '2025-12-07', '18:00:00', 45, 25),
('CrossFit Challenge', 'CrossFit', '2025-12-08', '17:00:00', 75, 12);


CREATE TABLE equipments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('Treadmill', 'Dumbbells', 'Balls', 'Bicycle', 'Bench', 'Mat', 'Other') NOT NULL,
    quantity INT NOT NULL CHECK (quantity > 0),
    status ENUM('Good', 'Average', 'To replace'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO equipments (name, type, quantity, status)
VALUES ('Pro Treadmill X1', 'Treadmill', 5, 'Good'),
('Iron Dumbbells Set', 'Dumbbells', 30, 'Good'),
('Fitness Balls Large', 'Balls', 12, 'Average'),
('Yoga Floor Mats', 'Mat', 40, 'To Replace');