<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $full_name = $_POST['full_name'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, role, full_name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $role, $full_name);
    $stmt->execute();
    echo "User registered successfully.";
}
?>

<form method="POST">
    Full Name: <input type="text" name="full_name" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Role: 
    <select name="role" required>
        <option value="student">Student</option>
        <option value="mentor">Mentor</option>
        <option value="staff">Staff</option>
    </select><br>
    <button type="submit">Register</button>
</form>
