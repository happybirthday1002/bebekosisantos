<?php 
class Product {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        return $this->db->fetchAll($sql);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        return $this->db->fetch($sql, [$id]);
    }
}
?>