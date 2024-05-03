<?php
require_once '../database/DBConnection.php';

class User extends DBConnection
{
    public function register($username, $email, $password, $userImage)
    {
        $sql = "INSERT INTO todo.user (username, email, password, user_image) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $hashed_password = md5($password);
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $userImage);
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
    
    public function userData($user)
    {
        $_SESSION['user'] = $user;
        header('Location: ../view/singlePage.php');
    }

    public function getUserDataByEmail($email) {
        $stmt = $this->connection->prepare("SELECT * FROM todo.user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function updateUserById($username, $email, $userId) {
        $sql = "UPDATE todo.user SET username = ?, email = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ssi", $username, $email, $userId);
        $updated = $stmt->execute();
        $stmt->close();
        return $updated;
    }

    public function getProfilePictureById($userId) {
        $sql = "SELECT user_image FROM todo.user WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($userImage);
        $stmt->fetch();
        $stmt->close();

        return $userImage;
    }
}