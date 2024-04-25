<?php
require_once '../userData/user.php';

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $user = new User();

    if (strlen($username) < 5) {
        header("Location: ../register.php?error=min_length");
        exit;
    }

    if ($user->emailExists($email)) {
        header("Location: ../register.php?error=email_exist");
        exit;

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalid_email");
        exit;
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $password)) {
        header("Location: ../register.php?error=password_pattern");
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