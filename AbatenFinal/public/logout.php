<?php
require_once '../config/base_config.php';
require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/classes/Database.php';
require_once BASE_PATH . '/classes/User.php';
require_once BASE_PATH . '/classes/Log.php';

session_start();

$db = new Database();
$user = new User($db);
$log = new Log($db);

if (isset($_SESSION['user_id'])) {
    $log->add($_SESSION['user_id'], "User logged out");
    $user->logout();
}

header("Location: index.php");
exit();
?>