<?php
session_start();
ob_start(); ?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>All tasks</title>
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
    <h1>All tasks</h1>
    <a href="../view/singlePage.php" class="add-task-button" style="margin-left: 20px">Back to your profile page</a>

    <div class="cart">
        <?php
        if (!empty($_SESSION['allTasks'])) {
            foreach ($_SESSION['allTasks'] as $row) {
                $text = $row['text'];
                $dataTime = $row['date_time'];
                $itemId = $row['id'];
                $selected = '';
                if ($row['status'] == 0) {
                    $selected = '0';
                } elseif ($row['status'] == 1) {
                    $selected = '1';
                } elseif ($row['status'] == 2) {
                    $selected = '2';
                } elseif ($row['status'] == 3) {
                    $selected = '3';
                }

                echo "<div class='cart-item'>";
                echo "<div class='item-title' style='max-width: 350px'>$text</div>";
                echo "<button class='modal-btn' style='margin-left: 650px; margin-top: -20px'>&boxH;</button>";
                echo "<div class='item-description' style='margin-left: 600px; margin-top: 10px'>$dataTime</div>";
                echo "<div class='item-description'>";
                echo '<br>';
                echo "<div class='checkbox-wrapper-13'>";
                echo "<form action='../todo/add_task.php' method='post' >";
                echo "<input type='hidden' name='itemId' value='$itemId'>";
                echo "<button type='submit' name='delete' style='margin: 10px' class='delete-task-button'>Delete</button>";
                echo "<button type='submit' name='update' style='margin-left: 90px; margin-top: 20px' class='add-task-button'>Update</button>";
                echo "<select id='statusSelect' name='status' style='margin-left: 90px'>";
                echo "<option value='0' " . ($selected == '0' ? 'selected' : '') . ">Select Status</option>";
                echo "<option value='1' " . ($selected == '1' ? 'selected' : '') . ">Done</option>";
                echo "<option value='2' " . ($selected == '2' ? 'selected' : '') . ">In Process</option>";
                echo "<option value='3' " . ($selected == '3' ? 'selected' : '') . ">In Test</option>";
                echo "</select>";
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
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>This is a modal window. You can put any content here.</p>
        </div>
    </div>
    <br>

    <div class="container">
        <form action="../todo/userPage.php" method="post">
            <input type="hidden" name="userId"
                   value="<?= $_SESSION['user']['id'] ?>">
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
    $(document).ready(function () {
        $('#statusSelect').change(function () {
            let status = $(this).val();
            let itemId = "<?php echo $itemId; ?>";
            $.ajax({
                type: 'POST',
                url: '../todo/add_task.php',
                data: {status: status, itemId: itemId},
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

</body>
</html>

