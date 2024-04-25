<?php
require_once 'DBConnection.php';

class User extends DBConnection
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
        $sql = "SELECT * FROM todo.user WHERE email='$email'";
        $result = $this->connection->query($sql);
        return $result->num_rows > 0;
    }
    public function login($email, $password)
    {
        $stmt = $this->connection->prepare("SELECT * FROM todo.user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return true;
            }
        }
        return false;
    }
}
