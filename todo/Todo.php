<?php
require_once '../userData/DBConnection.php';
class Todo extends DBConnection
{
    public function save($text, $id)
    {
        $sql = "INSERT INTO todo.todo_list (text, user_id) VALUES ('$text', '$id')";
        return $this->connection->query($sql);
    }

    public function getAllByUserId($userId){
        $sql = "SELECT * FROM todo.todo_list WHERE user_id = '$userId'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else{
            return array();
        }
    }
    public function deleteById($todoId)
    {
        $sql = "DELETE FROM todo.todo_list WHERE id = '$todoId'";
        return $this->connection->query($sql);
    }

    public function markCompletedById($todoId)
    {
        $sql = "UPDATE todo.todo_list SET task_done = 1 WHERE id = '$todoId'";
        return $this->connection->query($sql);
    }
    public function findTaskById($todoId)
    {
        $sql = "SELECT * FROM todo.todo_list WHERE id = '$todoId'";

        $result = $this->connection->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return array();
        }
    }

    public function updateTextById($todoId, $newText)
    {
        $sql = "UPDATE todo.todo_list SET text = '$newText' WHERE id = '$todoId'";
        return $this->connection->query($sql);
    }
}