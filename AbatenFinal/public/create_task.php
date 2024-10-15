<?php
session_start();
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Task.php';
require_once '../classes/Log.php';

$db = new Database();
$task = new Task($db);
$log = new Log($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($task->create($_SESSION['user_id'], $title, $description)) {
        $log->add($_SESSION['user_id'], "Task created: $title");
        header("Location: index.php?message=task_created");
    } else {
        header("Location: index.php?error=task_creation_failed");
    }
} else {
    header("Location: index.php");
}
?>