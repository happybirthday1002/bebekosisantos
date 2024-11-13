<?php
class OrderDetail {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addOrderDetail($orderId, $productId, $quantity) {
        $sql = "INSERT INTO order_details (order_id, product_id, quantity) VALUES (?, ?, ?)";
        $this->db->query($sql, [$orderId, $productId, $quantity]);
    }
}
?>