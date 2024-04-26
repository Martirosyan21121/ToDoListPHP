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
}