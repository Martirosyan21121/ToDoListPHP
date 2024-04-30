
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
    <h1>Single Page</h1>
    <a class="add-task-button" href="../loginData/logout.php" style="margin-left: 50px">
        Logout
    </a>

    <?php
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        echo "<h3 style='margin-left: 70%'> Username:____$username</h3>";
        echo "<h3 style='margin-left: 70%'> Email:____$email</h3>";
    } else if (isset($_SESSION['database'])) {
        $username = $_SESSION['database']['username'];
        $email = $_SESSION['database']['email'];
        echo "<h3 style='margin-left: 80%'> Username:____$username</h3>";
        echo "<h3 style='margin-left: 80%'> Email:____ $email</h3>";
    } else {
        echo "<p>No username or email found.</p>";
    }
    ?>

    <div class="cart">
        <?php
        if (!empty($_SESSION['allData'])) {
            foreach ($_SESSION['allData'] as $row) {
                $text = $row['text'];
                $itemId = $row['id'];
                $isChecked = $row['task_done'] == 1 ? 'checked' : '';
                echo "<div class='cart-item'>";
                echo "<div class='item-title'>$text</div>";
                echo "<div class='item-description'>";
                echo '<br>';
                echo "<div class='checkbox-wrapper-13'>";
                echo "<form action='../todo/add_task.php' method='post'>";
                echo "<input type='hidden' name='itemId' value='$itemId'>";
                echo "<button type='submit' name='delete' style='margin: 10px' class='delete-task-button'>Delete</button>";
                echo "<button type='submit' name='update' style='margin-left: 90px; margin-top: 40px' class='add-task-button'>Update</button>";
                echo "<input type='checkbox' class='checkbox-group' name='done[]' value='$itemId' style='margin-left: 400px; margin-top: -40px' $isChecked/>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>You don't have any data !!!</p>";
        }
        ?>
    </div>

    <br>
    <div class="container">
        <form action="../todo/userPage.php" method="post">
            <input type="hidden" name="userId"
                   value="<?php
                   $id = $_SESSION['database']['id'];
                   echo "$id"
                   ?>">
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
<script>
    $(document).ready(function(){
        $('.checkbox-group').click(function(){
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '../todo/add_task.php',
                data: formData,
                success: function(response){
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

        });

        $('.checkbox-group').click(function(){
            $(this).prop('checked', !$(this).prop('checked'));

            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '../todo/add_task.php',
                data: formData,
                success: function(response){
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

    });


</script>


</body>
</html>

<!--../todo/add_task.php-->