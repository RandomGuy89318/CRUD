<?php
// public/edit_task.php
require_once '../config/base_config.php';
require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/classes/Database.php';
require_once BASE_PATH . '/classes/Task.php';
require_once BASE_PATH . '/classes/Log.php';

session_start();

$db = new Database();
$task = new Task($db);
$log = new Log($db);

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    if ($task->update($id, $title, $description, $status)) {
        $log->add($_SESSION['user_id'], "Task updated: $title");
        header("Location: index.php?message=task_updated");
    } else {
        header("Location: index.php?error=task_update_failed");
    }
} else {
    // If it's a GET request, we're just displaying the form
    $task_id = $_GET['id'];
    // Fetch the task details and pass them to the view
    $task_details = $task->getById($task_id);
    include BASE_PATH . '/views/edit_task_form.php';
}
?>