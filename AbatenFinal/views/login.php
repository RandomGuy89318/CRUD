<?php include 'header.php'; ?>
<h2>Login</h2>
<form action="login_process.php" method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <input type="submit" value="Login">
    </div>
</form>
<p>Don't have an account? <a href="index.php?page=register">Register here</a></p>
<?php include 'footer.php'; ?>