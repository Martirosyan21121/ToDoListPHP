<?php
require_once '../model/User.php';
require_once '../model/UserPic.php';

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $user = new User();
    $userPic = new UserPic();

    if (strlen($username) < 5) {
        header("Location: ../view/register.php?error=min_length");
        exit;
    }

    if ($user->emailExists($email)) {
        header("Location: ../view/register.php?error=email_exist");
        exit;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/register.php?error=invalid_email");
        exit;
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $password)) {
        header("Location: ../view/register.php?error=password_pattern");
        exit;
    }

    if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['user_image']['name'];
        $image_tmp_name = $_FILES['user_image']['tmp_name'];

        $upload_directory = '../img/userPic/';
        $uploaded_image_path = $upload_directory . $image_name;
        move_uploaded_file($image_tmp_name, $uploaded_image_path);

    } else {
        $uploaded_image_path = NULL;
    }

    session_start();
    $registered = $user->register($username, $email, $password);
    if ($registered) {
        $userData = $user->getUserDataByEmail($email);

        $userId = $userData['id'];
        if ($uploaded_image_path === null){
            $userPic->userPicPath(null);
        } else{
            $userPic->savePic($image_name, $userId);
            $userPic->userPicPath($uploaded_image_path);
        }
        $user->userData($userData);
        exit;
    } else {
        echo "Registration failed.";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

