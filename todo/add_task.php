<?php
require_once '../todo/Todo.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $user_id = $_POST['id'];
    $delete = $_POST['delete'];
    $update = $_POST['update'];
    $todo = new Todo();

    session_start ();
    $save = $todo->save($text, $user_id);

    if ($save) {
        $show = $todo->getAllByUserId($user_id);
        $_SESSION['allData'] = $show;

        header('Location: ../singlePage.php');
    } else {
        header('Location: ../addTask.php');
    }


}