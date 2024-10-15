<?php include BASE_PATH . '/views/header.php'; ?>
<h2>Edit Task</h2>
<form action="edit_task.php" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($task_details['id']); ?>">
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($task_details['title']); ?>" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($task_details['description']); ?></textarea>
    </div>
    <div>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="pending" <?php echo $task_details['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="in_progress" <?php echo $task_details['status'] == 'in_progress' ? 'selected' : ''; ?>>In Progress</option>
            <option value="completed" <?php echo $task_details['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Update Task">
    </div>
</form>
<?php include BASE_PATH . '/views/footer.php'; ?>