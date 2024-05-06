<!DOCTYPE html>
<html lang="">
<head>
    <title>Add task page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
    <h1>Add task</h1>

    <div class="main-agileinfo">
        <div class="agileits-top">

            <form action="../todo/add_task.php" method="post">
                <input class="text" type="text" name="text" placeholder="Text" required="">
                <br>
                <input type="datetime-local" name="dataTime" placeholder="Data time" step="60">
                <?php
                session_start();
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    ?>
                    <input class="text" type="hidden" name="id" value="<?php echo $id ?>">
                    <?php
                }
                ?>

                <div class="file-input-container">
                    <label for="file-input" class="custom-file-upload">
                        Choose file
                    </label>
                    <input id="file-input" type="file" name="keepFile" onchange="fileName(this)">
                    <span id="file-name"></span>
                </div>
                <input type="submit" value="ADD TASK">
            </form>
        </div>
    </div>

    <div class="container">
        <form action="../view/allTasks.php" method="post">
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
<script>
    function fileName(input) {
        let fileName = '';
        if (input.files.length > 0) {
            fileName = input.files[0].name;
        }
        let fileNameSpan = document.getElementById('file-name');
        fileNameSpan.textContent = fileName;
    }

</script>
</body>
</html>