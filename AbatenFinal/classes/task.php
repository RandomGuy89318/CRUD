<?php
class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($user_id, $title, $description) {
        $sql = "INSERT INTO tasks (user_id, title, description) VALUES ('".$user_id."', '".$this->db->escape($title)."', '".$this->db->escape($description)."')";
        return $this->db->query($sql);
    }

    public function getAll($user_id) {
        $sql = "SELECT * FROM tasks WHERE user_id = '".$user_id."'";
        return $this->db->query($sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM tasks WHERE id = '".$this->db->escape($id)."'";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $title, $description, $status) {
        $sql = "UPDATE tasks SET title = '".$this->db->escape($title)."', description = '".$this->db->escape($description)."', status = '".$this->db->escape($status)."' WHERE id = '".$id."'";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM tasks WHERE id = '".$id."'";
        return $this->db->query($sql);
    }
}
?>