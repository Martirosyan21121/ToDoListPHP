<?php
require_once '../userData/DBConnection.php';
class Todo extends DBConnection
{
    public function save($text)
    {
        $sql = "INSERT INTO todo.todo_list (text, user_id) VALUES ('$text')";
        return $this->connection->query($sql);
    }
}