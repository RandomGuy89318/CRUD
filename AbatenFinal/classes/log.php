<?php
class Log {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function add($user_id, $action) {
        $sql = "INSERT INTO logs (user_id, action) VALUES ('".$user_id."', '".$this->db->escape($action)."')";
        return $this->db->query($sql);
    }

    public function getAll() {
        $sql = "SELECT logs.*, users.username FROM logs LEFT JOIN users ON logs.user_id = users.id ORDER BY logs.timestamp DESC";
        return $this->db->query($sql);
    }
}
?>