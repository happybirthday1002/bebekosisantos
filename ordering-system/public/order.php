
<?php
include_once('../config/config.php');
include_once('../classes/Product.php');
include_once('../classes/Order.php');
include_once('../classes/OrderDetail.php');
include_once('../templates/header.php');

$product = new Product();
$products = $product->getAllProducts();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo "Please login to place an order.";
        exit;
    }

    $userId = $_SESSION['user_id'];
    $totalAmount = 0;
    $order = new Order();
    $orderId = $order->createOrder($userId, $totalAmount);

    foreach ($_POST['products'] as $productId => $quantity) {
        $prod = $product->getProductById($productId);
        $orderDetail = new OrderDetail();
        $orderDetail->addOrderDetail($orderId, $productId, $quantity);
        $totalAmount += $prod['price'] * $quantity;
    }

    echo "Order placed successfully!";
}

?>

<form method="POST">
    <?php foreach ($products as $prod) { ?>
        <div>
            <h3><?php echo $prod['name']; ?></h3>
            <p><?php echo $prod['description']; ?></p>
            <p>Price: $<?php echo $prod['price']; ?></p>
            <input type="number" name="products[<?php echo $prod['id']; ?>]" min="1" placeholder="Quantity">
        </div>
    <?php } ?>
    <button type="submit">Place Order</button>
</form>

<?php include_once('../templates/footer.php'); ?>