<?php
require_once '../database/DBConnection.php';

class Todo extends DBConnection
{
    public function save($text, $id)
    {
        $sql = "INSERT INTO todo.todo_list (text, user_id) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("si", $text, $id);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }


    public function getAllByUserId($userId)
    {
        $sql = "SELECT * FROM todo.todo_list WHERE user_id = '$userId'";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
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
        $sqlCheck = "SELECT task_done FROM todo.todo_list WHERE id = '$todoId'";
        $resultCheck = $this->connection->query($sqlCheck);

        if ($resultCheck && $resultCheck->num_rows > 0) {
            $row = $resultCheck->fetch_assoc();
            $taskDone = $row['task_done'];

            if ($taskDone == 0) {
                $sqlUpdate = "UPDATE todo.todo_list SET task_done = 1 WHERE id = '$todoId'";
                return $this->connection->query($sqlUpdate);
            } else if ($taskDone == 1) {
                $sqlUpdate = "UPDATE todo.todo_list SET task_done = 0 WHERE id = '$todoId'";
                return $this->connection->query($sqlUpdate);
            }
        }
        return false;
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
        $sql = "UPDATE todo.todo_list SET text = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("si", $newText, $todoId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}