<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ordering_system');

function getDB() {
    try {
        $dbConnection = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS
        );
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    } catch (PDOException $e) {
        echo "Error connecting to the database: " . $e->getMessage();
    }
}
?>