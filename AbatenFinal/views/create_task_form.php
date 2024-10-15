<?php include 'header.php'; ?>
<h2>Create New Task</h2>
<form action="create_task.php" method="post">
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div>
        <input type="submit" value="Create Task">
    </div>
</form>
<?php include 'footer.php'; ?>