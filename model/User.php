<?php
require_once '../database/DBConnection.php';

class User extends DBConnection
{
    public function register($username, $email, $password)
    {
        $sql = "INSERT INTO todo.user (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        $hashed_password = md5($password);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function emailExists($email)
    {
        $email = $this->connection->real_escape_string($email);
        $sql = "SELECT * FROM todo.user WHERE email='$email'";
        $result = $this->connection->query($sql);
        return $result->num_rows > 0;
    }

    public function login($email, $password)
    {
        $hashed_password = md5($password);
        $stmt = $this->connection->prepare("SELECT * FROM todo.user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $hashed_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return true;
        }

        return false;
    }


    public function getUserDataByEmail($email) {
        $stmt = $this->connection->prepare("SELECT * FROM todo.user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null; // User not found
        }
    }

}
