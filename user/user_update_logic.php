<?php
require_once '../model/User.php';

session_start();
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $userId = $_POST ['id'];

    $user = new User();

    if (strlen($username) < 5) {
        header("Location: ../view/updateUser.php?error=min_length");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/updateUser.php?error=invalid_email");
        exit;
    }

    $updated = $user->updateUserById($username, $email, $userId);

    if ($updated) {
        $userData = $user->getUserDataByEmail($email);

        $user->userData($userData);
        header("Location: ../view/singlePage.php");
    } else {
        echo "Updated failed.";
    }
}