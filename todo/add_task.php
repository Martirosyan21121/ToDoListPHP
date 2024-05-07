<?php
require_once '../model/Todo.php';
require_once '../todo/TodoFunctions.php';
require_once '../model/TaskFile.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $todo = new Todo();
    $taskFile = new TaskFile();
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

    if (isset($_POST['status']) && isset($_POST['itemId'])) {
        $status = $_POST['status'];
        $itemId = $_POST['itemId'];
        $selected = $todo->markCompletedById($itemId, $status);

        if (!$selected) {
            $todoFun->handleError('selected_failed');
        }
        $todoFun->reloadTodoList();
    }

    $text = $_POST['text'];
    $dataTime = $_POST['dataTime'];
    $userId = $_POST['id'];
    $saveResult = $todo->save($text, $dataTime, $userId);
    if ($saveResult) {
        if (isset($_FILES['keep_file']) && $_FILES['keep_file']['error'] === UPLOAD_ERR_OK) {
            $task = $todo->findTaskById($userId);
            $taskId = $task['id'];
            $image_tmp_name = $_FILES['keep_file']['tmp_name'];
            $image_name = $taskId . $_FILES['keep_file']['name'];
            $upload_directory = '/img/taskFiles/';


            if (!file_exists($upload_directory)) {
                mkdir($upload_directory, 0777, true);
            }

            $uploaded_image_path = $upload_directory . $image_name;

            if (!move_uploaded_file($image_tmp_name, $uploaded_image_path)) {
                header("Location: ../view/add_task.php?error=file_upload_failed");
                exit;
            }

//            $taskFile->saveFile($image_name);
//            $file = $taskFile->findTaskFileByName($image_name);
//            $fileId = $file['id'];
        }
        $todoFun->reloadTodoList();

    } else {
        $todoFun->handleError('save_failed');
    }
}




