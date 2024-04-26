<?php
require_once '../singlePage.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['userId'];

    $_SESSION['id'] = $text;
    header('Location: ../addTask.php');

}