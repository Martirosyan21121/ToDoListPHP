<?php
require_once '../userData/user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $login = $user->login($email, $password);

    if ($login) {
        header('Location: ../singlePage.php');
    } else {
        header('Location: ../index.php');
    }
}