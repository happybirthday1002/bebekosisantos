<?php
// public/index.php

include_once('../config/config.php');
include_once('../classes/Product.php');
include_once('../templates/header.php');

// Create an instance of the Product class
$product = new Product();

// Fetch all products from the database
$products = $product->getAllProducts();
?>

<div class="container">
    <h2>Welcome to Our Ordering System</h2>
    <p>Browse our products and place your order.</p>

    <div class="products">
        <?php foreach ($products as $prod) { ?>
            <div class="product">
                <h3><?php echo htmlspecialchars($prod['name']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($prod['description'])); ?></p>
                <p>Price: $<?php echo number_format($prod['price'], 2); ?></p>
                <a href="order.php?product_id=<?php echo $prod['id']; ?>" class="btn">Order Now</a>
            </div>
        <?php } ?>
    </div>

    <div class="auth-links">
        <a href="login.php">Login</a> | 
        <a href="register.php">Register</a>
    </div>
</div>

<?php include_once('../templates/footer.php'); ?>