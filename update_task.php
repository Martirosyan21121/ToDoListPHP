<!DOCTYPE html>
<html>
<head>
    <title>Update page</title>
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
    <h1>Update Task</h1>


    <div class="main-agileinfo">
        <div class="agileits-top">

            <form action="todo/update.php" method="post">

                <?php
                session_start();

                if (isset($_SESSION['task'])) {
                    $id_update = $_SESSION['task']['id'];
                    $text = $_SESSION['task']['text'];
                    ?>

                    <input class="text" type="text" name="text" placeholder="Text" value="<?php echo $text ?>" required="">

                    <input class="text" type="hidden" name="id" value="<?php echo $id_update ?>">
                    <?php
                }
                ?>

                <input type="submit" name="update" value="UPDATE TASK">
            </form>

        </div>
    </div>

    <div class="container">
        <form action="singlePage.php" method="post">
            <button type="submit" class="add-task-button">
                Back
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

<!-- //main -->
</body>
</html>