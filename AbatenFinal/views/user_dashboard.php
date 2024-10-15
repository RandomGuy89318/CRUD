<?php include 'header.php'; ?>
<h2>Welcome, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User'; ?></h2>
<h3>Your Tasks</h3>
<a href="create_task.php" class="button">Create New Task</a>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $tasks = $task->getAll($_SESSION['user_id']);
        while ($row = $tasks->fetch_assoc()):
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td>
                <a href="edit_task.php?id=<?php echo $row['id']; ?>" class="button">Edit</a>
                <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="button" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>