<?php
require_once '../todo/Todo.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $text = $_POST['text'];

    $todo = new Todo();

    $updateResult = $todo->updateTextById($id, $text);
    if ($updateResult) {
        reloadTodoList();
    } else {
        handleError('update_failed');
    }
    header('Location: ../addTask.php');
}

function reloadTodoList()
{
    $todo = new Todo();
    $userId = $_SESSION['userData']['id'];
    $show = $todo->getAllByUserId($userId);
    $_SESSION['allData'] = $show;
    header('Location: ../singlePage.php');
    exit();
}
