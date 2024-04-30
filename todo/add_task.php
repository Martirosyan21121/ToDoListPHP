<?php
require_once '../model/Todo.php';
require_once '../todo/TodoFunctions.php';

//session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $todo = new Todo();
    $todoFun = new TodoFunctions();

    if (isset($_POST['delete'])) {

        $deleteId = $_POST['itemId'];
        $deleteResult = $todo->deleteById($deleteId);

        if ($deleteResult) {
            $todoFun->reloadTodoList();
        } else {
            $todoFun->handleError('delete_failed');
        }
    }

    if (isset($_POST['update'])) {
        $updateId = $_POST['itemId'];
        $task = $todo->findTaskById($updateId);
        $todoFun->updateTask($task);
    }

    if (isset($_POST['done'])) {
        $checkedItems = $_POST['done'];
        foreach ($checkedItems as $checkedItem) {
            $checked = $todo->markCompletedById($checkedItem);
            if (!$checked) {
                $todoFun->handleError('mark_failed');
            }
        }
        $todoFun->reloadTodoList();
    }

    $text = $_POST['text'];
    $userId = $_POST['id'];
    $saveResult = $todo->save($text, $userId);

    if ($saveResult) {
        $todoFun->reloadTodoList();
    } else {
        $todoFun->handleError('save_failed');
    }
}




