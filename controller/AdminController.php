<?php

namespace controller;

use model\Admin;
use model\User;
use model\UserPic;

require_once "../model/Admin.php";
require_once "../model/User.php";
require_once "../model/UserPic.php";
class AdminController
{
    public function allUsersData(): array
    {
        $admin = new Admin();
        return $admin->getAllUserData();
    }

    public static function deleteUserById($userId): bool
    {
        $admin = new Admin();
        return $admin->deleteUserById($userId);
    }
}

if (isset($_GET['delId'])) {
    $user = new User();
    $userPic = new UserPic();
    $userData = $user->getUserDataById($_GET['delId']);
    $userPicId = $userData['files_id'];
    if ($userPicId !== null){
        $fileToUpdate = $userPic->findFileById($userData['files_id']);
        $fileToUpdateName = $fileToUpdate['files_name'];
        $filePathToUpdate = '../img/userPic/' . $fileToUpdateName;
        if (file_exists($filePathToUpdate)) {
            unlink($filePathToUpdate);
        }
        $userPic->deleteFileById($userData['files_id']);
    }



    $adminController = new AdminController();
    $adminController->deleteUserById($_GET['delId']);

    header("Location: ../view/allUsers.php");
    exit();
}
