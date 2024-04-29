<?php
require_once 'DBConnection.php';

class User extends DBConnection
{
    public function register($username, $email, $password)
    {
        $hashed_password = md5($password);
        $sql = "INSERT INTO todo.user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        return $this->connection->query($sql);
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
