-- Users table (for students and staff)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'mentor', 'staff') NOT NULL,
    full_name VARCHAR(100) NOT NULL
);

-- Diaries table (for storing student reports)
CREATE TABLE diaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    upload_date DATE NOT NULL,
    report TEXT,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Feedback table (for mentors or staff feedback)
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    diary_id INT NOT NULL,
    reviewer_id INT NOT NULL,
    feedback TEXT,
    marks INT,
    FOREIGN KEY (diary_id) REFERENCES diaries(id) ON DELETE CASCADE,
    FOREIGN KEY (reviewer_id) REFERENCES users(id) ON DELETE CASCADE
);
