<?php

include_once('../config/config.php');
include_once('../classes/User.php');
include_once('../templates/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->register($username, $email, $password);
    echo "Registration successful!";
}

?>

<form method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Register</button>
</form>

<?php include_once('../templates/footer.php'); ?>
