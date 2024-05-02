<?php

class UserFunctions
{
    function updateUser($user)
    {
        $_SESSION['user_update'] = $user;
        header('Location: ../view/updateUser.php');
        exit();
    }
}