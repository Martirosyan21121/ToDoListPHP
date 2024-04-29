<?php
require_once '../todo/Todo.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $todo = new Todo();

    if (isset($_POST['delete'])) {

        $deleteId = $_POST['itemId'];
        $deleteResult = $todo->deleteById($deleteId);

        if ($deleteResult) {
            reloadTodoList();
        } else {
            handleError('delete_failed');
        }
    }

    if (isset($_POST['update'])) {
        $updateId = $_POST['itemId'];
        $task = $todo->findTaskById($updateId);
        updateTask($task);

    }

    if (isset($_POST['checkbox'])) {
        $checkboxValues = $_POST['checkbox'];
        foreach ($checkboxValues as $itemId) {
            $todo->markCompletedById($itemId);
        }
    }

    $text = $_POST['text'];
    $userId = $_POST['id'];
    $saveResult = $todo->save($text, $userId);

    if ($saveResult) {
        reloadTodoList();
    } else {
        handleError('save_failed');
    }
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

function updateTask($task)
{
    $_SESSION['task'] = $task;
    header('Location: ../update_task.php');
    exit();
}

function handleError($errorType)
{
    header("Location: ../addTask.php?error=$errorType");
    exit();
}


