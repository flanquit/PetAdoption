<?php
// Include authentication functions
include 'functions/auth.php';

// Restrict access to admin-only page
restrictToAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.html">Admin Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <!-- Admin functionalities will be displayed here -->
            <h2>Welcome, Admin!</h2>
            <p>You can manage pets and users here.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Online Pet Adoption</p>
    </footer>
</body>
</html>
