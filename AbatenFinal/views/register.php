<?php include 'header.php'; ?>
<h2>Register</h2>
<form action="register_process.php" method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <input type="submit" value="Register">
    </div>
</form>
<p>Already have an account? <a href="index.php">Login here</a></p>
<?php include 'footer.php'; ?>