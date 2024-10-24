<?php
session_start();
include 'db.php';

if ($_SESSION['role'] == 'mentor') {
    $result = $conn->query("SELECT * FROM diaries");

    while ($diary = $result->fetch_assoc()) {
        echo "<h3>Report from Student ID: {$diary['student_id']}</h3>";
        echo "<p>{$diary['report']}</p>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['diary_id'] == $diary['id']) {
            $feedback = $_POST['feedback'];
            $marks = $_POST['marks'];
            $reviewer_id = $_SESSION['user_id'];

            $stmt = $conn->prepare("INSERT INTO feedback (diary_id, reviewer_id, feedback, marks) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iisi", $diary['id'], $reviewer_id, $feedback, $marks);
            $stmt->execute();
            echo "Feedback submitted successfully.";
        }

        echo '<form method="POST">
                <textarea name="feedback" placeholder="Provide feedback..." required></textarea><br>
                Marks: <input type="number" name="marks" min="0" max="100" required><br>
                <input type="hidden" name="diary_id" value="'.$diary['id'].'">
                <button type="submit">Submit Feedback</button>
              </form>';
    }
}
?>
