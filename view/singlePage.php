<?php
require_once "../model/User.php";
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Single page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
<div class="main-w3layouts wrapper">
    <h1>Your profile</h1>
    <nav class="top-bar">
        <a class="add-task-button" href="../loginData/logout.php" style="margin-left: 50px">Logout</a>
        <?php
        echo "<form action='../user/all_tasks.php' method='post'>";
        if (isset($_SESSION['user'])) {
            $email = $_SESSION['user']['email'];
            echo "<input type='hidden' name='email' value='$email'>";
            echo "<button class='add-task-button' style='margin-left: 50px;' type='submit' name='update_user'>All tasks</button>";
        }
        echo "</form>";
        ?>
    </nav>


    <?php
    if (isset($_SESSION['user'])) {
        $user = new User();
        $username = $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
        $profilePic = $_SESSION['user']['user_image'];
        $userId = $_SESSION['user']['id'];

        $userImage = $user->getProfilePictureById($userId);

        if ($userImage === null) {
            echo "<img class='avatar' alt='Avatar' src='../img/profilePick.png' style='margin-left: 75%'>";
        } else {
            $profilePicBase64 = base64_encode($userImage);
            $imageSrc = 'data:image/jpeg;base64,' . $profilePicBase64;
            echo "<img class='avatar' alt='Avatar' src='$imageSrc' style='margin-left: 75%'>";
        }

        echo "<h3 style='margin-left: 80%; margin-top: -45px'> Username:____$username</h3>";
        echo "<h3 style='margin-left: 80%'> Email:____ $email</h3>";
    } else {
        echo "<p>No username or email found.</p>";
    }
    ?>

    <br>

    <?php
    echo "<form action='../user/user_update.php' method='post'>";
    if (isset($_SESSION['user'])) {
        $email = $_SESSION['user']['email'];
        echo "<input type='hidden' name='email' value='$email'>";
        echo "<button class='add-task-button' style='margin-left: 80%;' type='submit' name='update_user'>Update your data</button>";
    }
    echo "</form>";
    ?>

    <div class="colorlibcopy-agile">
        <p>© 2024 project ToDo list using PHP</p>
    </div>
    <ul class="colorlib-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</body>
</html>