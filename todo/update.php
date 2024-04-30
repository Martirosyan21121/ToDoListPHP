<?php
require_once '../model/Todo.php';
require_once '../todo/TodoFunctions.php';


session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $text = $_POST['text'];

    $todo = new Todo();
    $todoFun = new TodoFunctions();

    $updateResult = $todo->updateTextById($id, $text);
    if ($updateResult) {
        $todoFun->reloadTodoList();
    } else {
        $todoFun->handleError('update_failed');
    }
    header('Location: ../view/addTask.php');
}