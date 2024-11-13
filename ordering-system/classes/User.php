<?php 
session_start ();
require_once ("../config/config.php..");
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($username, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        return $this->db->query($sql, [$username, $email, $passwordHash]);
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $user = $this->db->fetch($sql, [$username]);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->db->fetch($sql, [$id]);
    }
}

?>