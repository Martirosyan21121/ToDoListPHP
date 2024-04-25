<?php
require_once 'db_connection.php';

class user extends db_connection
{
    public function register($username, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO todo.user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        return $this->connection->query($sql);
    }

    public function emailExists($email)
    {
        $email = $this->connection->real_escape_string($email);
        $sql = "SELECT COUNT(*) as count FROM todo.user WHERE email='$email'";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM todo.user WHERE email='$email'";
        $result = $this->connection->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}