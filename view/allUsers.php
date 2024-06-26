<?php

use controller\AdminController;

require_once '../controller/AdminController.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Single page</title>
    <link rel="icon" href="/img/logo/logo.jpg" type="image/gif" sizes="any">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
<div class="main-w3layouts wrapper">
    <h1>All Users</h1>

    <nav class="top-bar">
        <a class="add-task-button" href="../loginData/logout.php" style="margin-left: 50px">Logout</a>
        <a href="../view/adminSinglePage.php" class="add-task-button" style="margin-left: 80%">Back</a>
    </nav>

    <table>
        <thead>
        <tr>
            <th>ID
            <th>Username
            <th>Email
            <th>All tasks
            <th>Edit user
            <th>Delete
            <th>Deactivate
        </thead>
        <tbody>
        <?php
        $adminController = new AdminController();
        $allUsers = $adminController->allUsersData();

        foreach ($allUsers

        as $user): ?>
        <tr>
            <td> <?= $user['id'] ?>
            <td> <?= $user['username'] ?>
            <td> <?= $user['email'] ?>
            <td>
                <button class="add-task-button"> All Tasks</button>
            <td>
                <button class="download-file-button"> Edit</button>
            <td><a href="../controller/AdminController.php?delId=<?= $user['id'] ?>" class="delete-task-button">Delete</a>


            <td>
                <button class="deactivate-button"> Deactivate</button>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br>

    <div class="colorlibcopy-agile">
        <p>© 2024 project ToDo list using PHP</p>
    </div>

    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>
</html>

<!--<form action="../controller/AdminController.php?delId=--><?php //= $user['id']?><!--" method="post">-->
<!--    <button class="delete-task-button" type="submit"> Delete </button>-->
<!--</form>-->