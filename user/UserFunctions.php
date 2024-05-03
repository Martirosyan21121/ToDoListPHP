<?php
session_start();
class UserFunctions
{
    function updateUser($user)
    {
        $_SESSION['user_data'] = $user;
        header('Location: ../view/updateUser.php');
        exit();
    }

}
