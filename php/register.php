<?php
require_once 'user.php';

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $user = new User();

    $registered = $user->register($username, $email, $password);
    if ($registered) {
        header("Location: singlePage.html");
        exit;
    } else {
        echo "Registration failed.";
    }
}