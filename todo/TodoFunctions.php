<?php

class TodoFunctions
{
    function reloadTodoList()
    {
        $todo = new Todo();
        $userId = $_SESSION['database']['id'];
        $show = $todo->getAllByUserId($userId);
        $_SESSION['allData'] = $show;
        header('Location: ../view/singlePage.php');
        exit();
    }

    function updateTask($task)
    {
        $_SESSION['task'] = $task;
        header('Location: ../view/update_task.php');
        exit();
    }

    function handleError($errorType)
    {
        header("Location: ../view/addTask.php?error=$errorType");
        exit();
    }
}