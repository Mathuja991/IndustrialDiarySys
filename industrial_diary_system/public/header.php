<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></title>
    <style>/* Reset some default styles */
body, h1, p {
    margin: 0;
    padding: 0;
}

/* Style for the body */
body {
    font-family: Arial, sans-serif; /* Use a clean font */
    line-height: 1.6; /* Improve readability */
    background-color: #f4f4f4; /* Light background color */
}

/* Header styling */
header {
    background: #007bff; /* Header background color */
    color: #fff; /* Text color */
    padding: 15px 20px; /* Padding around header */
}

/* Navigation styling */
nav {
    display: flex; /* Flexbox for alignment */
    justify-content: space-between; /* Space between items */
    align-items: center; /* Center items vertically */
}

nav ul {
    list-style-type: none; /* Remove bullets */
    display: flex; /* Display links in a row */
}

nav ul li {
    margin: 0 15px; /* Space between links */
}

nav ul li a {
    color: #fff; /* Link text color */
    text-decoration: none; /* Remove underline */
    font-weight: bold; /* Make text bold */
    transition: color 0.3s; /* Smooth color transition */
}

/* Hover effect for links */
nav ul li a:hover {
    color: #ffdd57; /* Change color on hover */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    nav ul {
        flex-direction: column; /* Stack items on smaller screens */
        align-items: center; /* Center items */
    }
    
    nav ul li {
        margin: 10px 0; /* Space between stacked links */
    }
}
/* Logo styling */
.logo img {
    max-width: 100%; /* Ensure logo is responsive */
    height: auto; /* Maintain aspect ratio */
}

/* Flexbox adjustments for nav */
nav {
    display: flex; /* Use flexbox for layout */
    align-items: center; /* Center items vertically */
    justify-content: space-between; /* Space out items */
}

/* Optional: Adjust ul and li if needed */
nav ul {
    display: flex; /* Keep links in a row */
    list-style-type: none; /* Remove bullets */
}

</style>
</head>
<body>
    <header>
        <nav>
        <div class="logo">
                <a href="../public/student_dashboard.php">
                    <img src="../image/logo.jpg" alt="Logo" width="300" height="auto"> <!-- Adjust the path and size as necessary -->
                </a>
            </div>
            <ul>
                <li><a href="../public/student_dashboard.php">Home</a></li>
                <li><a href="../public/profile.php"><?php echo isset($username) ? $username : 'Profile'; ?></a></li>

            <li><a href="../public/logout.php">Logout</a></li>
                <!-- Add other navigation items as needed -->
            </ul>
        </nav>
    </header>
