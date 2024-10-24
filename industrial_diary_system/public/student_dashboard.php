<?php
session_start();
include '../config/db.php';
include '../public/header.php';

// Handle student diary submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['role'] == 'student') {
    $student_id = $_SESSION['user_id'];
    $upload_date = date('Y-m-d');
    $week_number = $_POST['week_number'];
    $report = $_POST['report'];

    $stmt = $conn->prepare("INSERT INTO diaries (student_id, upload_date, week_number, report) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $student_id, $upload_date, $week_number, $report);
    $stmt->execute();

    echo "<p class='success-msg'>Diary for week $week_number uploaded successfully.</p>";
}

// Mentor feedback submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['role'] == 'mentor') {
    $feedback = $_POST['feedback'];
    $week_number = $_POST['week_number'];
    $student_id = $_POST['student_id'];

    $stmt = $conn->prepare("UPDATE diaries SET feedback = ?, reviewed = 1 WHERE student_id = ? AND week_number = ?");
    $stmt->bind_param("sii", $feedback, $student_id, $week_number);
    $stmt->execute();

    echo "<p class='success-msg'>Feedback for week $week_number submitted.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="../styles/stu_sty.css">
</head>
<body>



<main>
    <button id="toggleFormButton">Show Progress Report Form</button>
    <a href="../public/view_diary.php" class="btn">View Diary</a> <!-- View Diary Button -->
    <div class="container">
    <h2>Weekly Diary Submission</h2>
    <form method="POST">
        <label for="week_number">Select Week:</label>
        <select name="week_number" required>
            <?php for ($i = 1; $i <= 4; $i++): ?>
                <option value="<?php echo $i; ?>">Week <?php echo $i; ?></option>
            <?php endfor; ?>
        </select>

        <label for="report">Report:</label>
        <textarea name="report" rows="5" placeholder="Describe the work done this week..." required></textarea>

        <button type="submit">Submit Report</button>
    </form>

    <?php if ($_SESSION['role'] == 'mentor'): ?>
    <h2>Mentor Feedback</h2>
    <form method="POST">
        <label for="student_id">Student ID:</label>
        <input type="number" name="student_id" required>

        <label for="week_number">Week Number:</label>
        <select name="week_number" required>
            <?php for ($i = 1; $i <= 4; $i++): ?>
                <option value="<?php echo $i; ?>">Week <?php echo $i; ?></option>
            <?php endfor; ?>
        </select>

        <label for="feedback">Feedback:</label>
        <textarea name="feedback" rows="5" placeholder="Provide feedback..." required></textarea>

        <button type="submit">Submit Feedback</button>
    </form>
    <?php endif; ?>
</div>

</main>

<script>
document.getElementById('toggleFormButton').addEventListener('click', function() {
    var form = document.getElementById('progressForm');
    form.style.display = (form.style.display === 'none') ? 'block' : 'none';
});
</script>

<?php include '../public/footer.php'; ?>
</body>
</html>