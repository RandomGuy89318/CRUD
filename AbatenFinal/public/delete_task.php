<?php
session_start();
require_once '../config/config.php';
require_once '../classes/Database.php';
require_once '../classes/Task.php';
require_once '../classes/Log.php';

$db = new Database();
$task = new Task($db);
$log = new Log($db);

?>