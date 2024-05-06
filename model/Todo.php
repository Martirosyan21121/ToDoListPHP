<?php
require_once '../database/DBConnection.php';

class Todo extends DBConnection
{
    public function save($text, $keepFile, $dataTime ,$id)
    {
        date_default_timezone_set('Asia/Yerevan');

        $created_at = date('Y-m-d H:i:s');

        $sql = "INSERT INTO todo.todo_list (text, keep_file ,date_time ,user_id, created_at) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sssis", $text, $keepFile, $dataTime, $id, $created_at);
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
//
//    public function getAllTasksCountByUserId($userId)
//    {
//        $sql = "SELECT * FROM todo.todo_list WHERE user_id = '$userId'";
//        $result = $this->connection->query($sql);
//
//        if ($result->num_rows > 0) {
//            $count = 0;
//            while ($result->fetch_assoc()) {
//                $count += $count;
//            }
//            return count();
//        } else {
//            return array();
//        }
//    }



    public function deleteById($todoId)
    {
        $sql = "DELETE FROM todo.todo_list WHERE id = '$todoId'";
        return $this->connection->query($sql);
    }

    public function markCompletedById($todoId, $selectedValue)
    {
        if ($selectedValue < 0 || $selectedValue > 3) {
            return false;
        }
        $sqlUpdate = "UPDATE todo.todo_list SET status = '$selectedValue' WHERE id = '$todoId'";
        return $this->connection->query($sqlUpdate);
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

    public function updateTextById($todoId, $newText, $newDateTime, $keepFile)
    {
        date_default_timezone_set('Asia/Yerevan');
        $updated_at = date('Y-m-d H:i:s');

        $sql = "UPDATE todo.todo_list SET text = ?, keep_file = ?,  date_time = ?, created_at = ?, created_at = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sssssi", $newText, $keepFile, $newDateTime, $updated_at, $updated_at, $todoId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }
}