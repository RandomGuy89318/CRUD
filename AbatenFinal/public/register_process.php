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
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->register($username, $password, $email)) {
        $log->add($db->insert_id(), "User registered");
        header("Location: index.php?message=registered");
    } else {
        header("Location: register.php?error=registration_failed");
    }
} else {
    header("Location: register.php");
}
?>