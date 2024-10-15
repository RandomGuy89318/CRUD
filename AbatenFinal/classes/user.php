<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($username, $password, $email) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, email) VALUES ('".$this->db->escape($username)."', '".$hashed_password."', '".$this->db->escape($email)."')";
        return $this->db->query($sql);
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = '".$this->db->escape($username)."'";
        $result = $this->db->query($sql);
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user; // Return the user data
            }
        }
        return false;
    }

    public function logout() {
        session_destroy();
    }
}
?>