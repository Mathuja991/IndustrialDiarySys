<?php
session_start();
include '../config/db.php';
include '../public/header.php';

// Ensure the user is logged in and is a student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header('Location: ../public/logout.php');
    exit();
}

$student_id = $_SESSION['user_id'];

// Fetch the diaries from the database
$stmt = $conn->prepare("SELECT upload_date, report FROM diaries WHERE student_id = ? ORDER BY upload_date DESC");
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Diary</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<header>
    <h1>Your Submitted Diaries</h1>
</header>

<main>
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Diary Content</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['upload_date']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($row['report'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No diaries submitted yet.</p>
    <?php endif; ?>

    <a href="student_dashboard.php" class="btn">Back to Dashboard</a>
</main>

<?php include '../public/footer.php'; ?>
</body>
</html>
