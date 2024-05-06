<?php
require_once '../database/DBConnection.php';

class UserPic extends DBConnection
{
    public function savePic($imageName, $userId)
    {
        $sql = "INSERT INTO todo.user_picture (user_image, user_id) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ss", $imageName, $userId);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function userPicPath($picPath)
    {
        $_SESSION['pic_path'] = $picPath;
        header('Location: ../view/singlePage.php');
    }

    public function findImageByUserId($userId)
    {
        $sql = "SELECT user_image FROM todo.user_picture WHERE user_id = ?";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->bind_result($userImage);
        $stmt->fetch();
        $stmt->close();
        return $userImage;
    }
}