<?php

class UserFunctions
{
    function updateUser($user)
    {
        $user = $_SESSION['user_update'];

        header('Location: ../view/updateUser.php');
        exit();
    }
}