<!DOCTYPE html>
<html>
<head>
    <title>Single page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
<div class="main-w3layouts wrapper">
    <h1>Single Page</h1>

    <a class="add-task-button" href="todo/logout.php" style="margin-left: 50px">
        Logout
    </a>

    <?php
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        echo "<h3 style='margin-left: 70%'> Username:____$username</h3>";
        echo "<h3 style='margin-left: 70%'> Email:____$email</h3>";
    } else if (isset($_SESSION['userData'])) {
        $username = $_SESSION['userData']['username'];
        $email = $_SESSION['userData']['email'];
        echo "<h3 style='margin-left: 70%'> Username:____$username</h3>";
        echo "<h3 style='margin-left: 70%'> Email:____ $email</h3>";
    } else {
        echo "<p>No username or email found.</p>";
    }
    ?>

    <div class="main-agileinfo">
        <div class="agileits-top">

        </div>
    </div>
    <br>

    <div class="container">
        <form action="todo/userPage.php" method="post">
            <button type="submit" class="add-task-button">

                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId'] = $_SESSION['userData']['id']; ?>">
                Add task
            </button>
        </form>
    </div>


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