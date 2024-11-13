<?php
include_once('../config/config.php');
include_once('../classes/User.php');
include_once('../templates/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $userData = $user->login($username, $password);

    if ($userData) {
        session_start();
        $_SESSION['user_id'] = $userData['id'];
        echo "Login successful!";
    } else {
        echo "Invalid credentials.";
    }
}

?>

<form method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>

<?php include_once('../templates/footer.php'); ?>
