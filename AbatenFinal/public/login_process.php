<?php
session_start();
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/User.php';
require_once '../classes/Log.php';

$db = new Database();
$user = new User($db);
$log = new Log($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userData = $user->login($username, $password);
    if ($userData) {
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['username'] = $userData['username']; // Store the username in the session
        $_SESSION['is_admin'] = $userData['is_admin'];
        $log->add($_SESSION['user_id'], "User logged in");
        header("Location: index.php");
    } else {
        header("Location: index.php?error=login_failed");
    }
} else {
    header("Location: index.php");
}
?>