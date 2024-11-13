<?php
class Order {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createOrder($userId, $totalAmount) {
        $sql = "INSERT INTO orders (user_id, total_amount) VALUES (?, ?)";
        $this->db->query($sql, [$userId, $totalAmount]);
        return $this->db->conn->lastInsertId();
    }
}
?>