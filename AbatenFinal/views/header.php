<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Task Management System</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <nav>
                <a href="index.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            </nav>
        <?php endif; ?>
    </header>
    <main>

<!-- views/footer.php -->
    </main>
    <footer>
        <p>&copy; 2024 Task Management System</p>
    </footer>
    <script src="/assets/js/script.js"></script>
</body>
</html>