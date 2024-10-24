<?php
session_start(); // Start the session to access session variables
include '../public/header.php';
// Sample user data, replace with actual data from your database
$user = [
    'username' => 'john_doe',
    'email' => 'john@example.com',
    'full_name' => 'John Doe',
    // Add other user data as needed
];

// Check if user is logged in (you can modify this based on your authentication)
if (!isset($_SESSION['user_id'])) {
    header('Location: ../public/login.php'); // Redirect to login page if not logged in
    exit;
}

// Optionally, fetch user data from the database using the user ID stored in the session
// $user = fetchUserData($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../styles/profile_sty.css"> <!-- Link to your CSS -->
</head>
<body>
   

    <main>
        <h1>User Profile</h1>
        <div class="profile-info">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <!-- Add other user details as needed -->
        </div>

        <h2>Edit Profile</h2>
        <form action="update_profile.php" method="POST">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <input type="submit" value="Update Profile">
        </form>
    </main>

    <?php include '../public/footer.php'; // Include the footer ?>
</body>
</html>
