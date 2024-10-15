
<?php
class Database {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'task_master');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function escape($value) {
        return $this->conn->real_escape_string($value);
    }
}
?>