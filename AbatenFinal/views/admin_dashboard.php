<?php include 'header.php'; ?>
<h2>Admin Dashboard</h2>
<h3>User Logs</h3>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Action</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $logs = $log->getAll();
        while ($row = $logs->fetch_assoc()):
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['action']); ?></td>
            <td><?php echo htmlspecialchars($row['timestamp']); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>