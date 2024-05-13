<?php

use model\UserPic;
session_start();
ob_start();

require_once '../model/UserPic.php';

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
    <h1>Your profile</h1>
    <nav class="top-bar">
        <a class="add-task-button" href="../loginData/logout.php" style="margin-left: 50px">Logout</a>

    </nav>

    <table>
        <thead>
        <tr>
            <th>ID
            <th>Username
            <th>Email
        </thead>
        <tbody>
        <tr>
            <td>1
            <td>Malcolm
            <td>Reynolds
        <tr>
            <td>1
            <td>Malcolm
            <td>Reynolds
        <tr>
            <td>1
            <td>Malcolm
            <td>Reynolds
        <tr>
            <td>1
            <td>Malcolm
            <td>Reynolds
        </tbody>
    </table>

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

