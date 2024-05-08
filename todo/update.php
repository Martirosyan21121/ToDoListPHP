<?php
require_once '../model/Todo.php';
require_once '../model/TaskFile.php';
require_once '../todo/TodoFunctions.php';


session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $dateTime = $_POST['dateTime'];
    $todo = new Todo();
    $taskFile = new TaskFile();
    $todoFun = new TodoFunctions();


    if (isset($_FILES['task_file']) && $_FILES['task_file']['error'] === UPLOAD_ERR_OK) {
        $task = $todo->findTaskById($id);
        $taskId = $task['id'];
        $file_tmp_name = $_FILES['task_file']['tmp_name'];
        $file_name = $taskId . $_FILES['task_file']['name'];
        $upload_directory = '../img/taskFiles/';

        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0777, true);
        }
        $uploaded_image_path = $upload_directory . $file_name;

        if (!move_uploaded_file($file_tmp_name, $uploaded_image_path)) {
            header("Location: ../view/add_task.php?error=file_upload_failed");
            exit;
        }
        $taskFile->saveFile($file_name);
        $file = $taskFile->findTaskFileByName($file_name);
        $fileId = $file['id'];

        if (!empty($fileId)) {

        }
    } else {
        $fileId = null;
        $uploaded_image_path = null;
        $image_name = null;
    }

    $updateResult = $todo->updateText($id, $text, $dateTime, $fileId);
    if ($updateResult) {
        $todoFun->reloadTodoList();
    } else {
        $todoFun->handleError('update_failed');
    }
    header('Location: ../view/addTask.php');
}