<?php
require_once '../userData/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
//
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        header("Location: ../index.php?error=invalid_email");
//        exit;
//    }
    $login = $user->login($email, $password);

    if ($login) {
        header('Location: ../singlePage.php');
    } else {
        header('Location: ../index.php?error=wrong_login');
    }
}
