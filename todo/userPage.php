<?php
require_once '../view/singlePage.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['userId'];

    $_SESSION['id'] = $text;
    header('Location: ../view/addTask.php');
exit();
}