<?php
require_once '../userData/User.php';
require_once '../todo/Todo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User();

    $todo = new Todo();
//
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        header("Location: ../index.php?error=invalid_email");
//        exit;
//    }
    session_start ();
    $login = $user->login($email, $password);
    if ($login) {
        $userData = $user->getUserDataByEmail($email);
        $userId = $userData['id'];
        $show = $todo->getAllByUserId($userId);
        $_SESSION['allData'] = $show;

        $_SESSION['userData'] = $userData;

        header('Location: ../singlePage.php');

    } else {
        header('Location: ../index.php?error=wrong_login');
    }
}
