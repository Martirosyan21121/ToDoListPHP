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

    public function deleteUserById($userId)
    {
        var_dump($_GET['id']);
        $admin = new Admin();
        return $admin->deleteUserById($userId);
    }

}