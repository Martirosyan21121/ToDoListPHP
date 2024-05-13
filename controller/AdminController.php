<?php

namespace controller;

use model\Admin;

require_once "../model/Admin.php";

class AdminController
{
    public function allUsersData()
    {
        $admin = new Admin();
        return $admin->getAllUserData();
    }


    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $userId = $_POST['id'];
            $admin = new Admin();
            $deleted = $admin->deleteUserById($userId);

            if ($deleted) {
                header("Location: ../view/success.php");
                exit();
            } else {

                header("Location: ../view/error.php");
                exit();
            }
        } else {
            header("Location: ../view/error.php");
            exit();
        }
    }
}

