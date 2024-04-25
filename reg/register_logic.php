<?php
require_once '../userData/user.php';

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $user = new User();

    if ($user->emailExists($email)) {
        header("Location: ../register.php?error=email_exists");
        exit;
    }

    $registered = $user->register($username, $email, $password);
    if ($registered) {
        header("Location: ../singlePage.php");
        exit;
    } else {
        echo "Registration failed.";
    }
}