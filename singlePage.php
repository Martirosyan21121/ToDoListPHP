

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
        <form action="logout.php" method="post" style="margin-left: 50px">
            <button type="submit" class="add-task-button">
               Logout
            </button>
        </form>

    <div class="main-agileinfo">
        <div class="agileits-top">
            <?php
            session_start();
            if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
                $username = $_SESSION['username'];
                $email = $_SESSION['email'];
                echo "<h3> Username`____$username</h3>";
                echo "<h3> Email`____ $email</h3>";
            } else {
                echo "<p>No username or email found.</p>";
            }
            ?>

        </div>

    </div>
    <div class="container">
        <form action="addTask.php" method="post">
            <button type="submit" class="add-task-button">
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