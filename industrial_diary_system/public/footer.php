<?php
// Start of the footer.php file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Ensure the body and html take up full height */
        html, body {
            height: 100%; /* Full height */
            margin: 0; /* Remove default margin */
            display: flex; /* Use Flexbox */
            flex-direction: column; /* Align children in a column */
        }

        /* Main content area */
        .content {
            flex: 1; /* Take up remaining space */
        }

        footer {
            background-color: #f8f9fa; /* Light background color */
            text-align: center; /* Center text */
            padding: 20px; /* Add some padding */
            width: 100%; /* Full width */
        }

        footer p {
            margin: 0; /* Remove default margin */
        }

        footer nav {
            margin-top: 10px; /* Add some space above the nav */
        }

        footer nav ul {
            list-style-type: none; /* Remove bullet points */
            padding: 0; /* Remove padding */
            margin: 0; /* Remove margin */
            display: inline-block; /* Center the list */
        }

        footer nav ul li {
            display: inline; /* Display links in a line */
            margin: 0 15px; /* Add margin between links */
        }

        footer nav ul li a {
            text-decoration: none; /* Remove underline */
            color: #007bff; /* Link color */
        }

        footer nav ul li a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Your main content goes here -->
    </div>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Industrial Diary Management System. All rights reserved.</p>
        <nav>
            <ul>
                <li><a href="privacy_policy.php">Privacy Policy</a></li>
                <li><a href="terms_of_service.php">Terms of Service</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>
