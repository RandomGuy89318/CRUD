<?php
// public/index.php
require_once '../config/base_config.php';
require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/classes/Database.php';
require_once BASE_PATH . '/classes/User.php';
require_once BASE_PATH . '/classes/Task.php';
require_once BASE_PATH . '/classes/Log.php';

session_start();

$db = new Database();
$user = new User($db);
$task = new Task($db);
$log = new Log($db);

$page = isset($_GET['page']) ? $_GET['page'] : '';

if (isset($_SESSION['user_id'])) {
    // User is logged in
    switch ($page) {
        case 'create_task':
            include BASE_PATH . '/views/create_task_form.php';
            break;
        case 'edit_task':
            // The actual editing is handled in edit_task.php
            header("Location: edit_task.php?id=" . $_GET['id']);
            break;
        default:
            if ($_SESSION['is_admin']) {
                include BASE_PATH . '/views/admin_dashboard.php';
            } else {
                include BASE_PATH . '/views/user_dashboard.php';
            }
    }
} else {
    // User is not logged in
    switch ($page) {
        case 'register':
            include BASE_PATH . '/views/register.php';
            break;
        default:
            include BASE_PATH . '/views/login.php';
    }
}
?>