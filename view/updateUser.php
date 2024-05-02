<!DOCTYPE html>
<html lang="">
<head>
    <title>Update your data</title>
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
    <h1>Update your data</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">

            <form action="../user/user_update.php" method="post">
                <?php
                if (!empty($_SESSION['user_update'])) {
                    foreach ($_SESSION['user_update'] as $row) {

                        $user_id = $row['user_update']['id'];
                        $username = $row['user_update']['username'];
                        $email = $row['user_update']['email'];
                        $password = $row['user_update']['password'];
                    ?>
                    <input class="text" type="text" name="username" placeholder="Username"
                           value="<?php echo $username ?>" required="">

                    <?php if (!empty($username_length)) { ?>
                        <p style="color: red;"><?php echo $username_length; ?></p>
                    <?php } ?>

                    <input class="text email" type="email" name="email" placeholder="Email" value="<?php echo $email ?>"
                           required="">

                    <?php if (!empty($email_exist)) { ?>
                        <p style="color: red;"><?php echo $email_exist; ?></p>
                    <?php } ?>

                    <input class="text" type="password" name="password" placeholder="Password"
                           value="<?php echo $password ?>" required="">

                    <?php if (!empty($password_p)) { ?>
                        <p style="color: red;"><?php echo $password_p; ?></p>
                    <?php } ?>

                    <input class="text" type="hidden" name="user_id" value="<?php echo $user_id ?>">

                    <?php
                    }
                }
                ?>
                <input type="submit" value="UPDATE">
            </form>

            <p>Back to your page <a href="../view/singlePage.php"> Go Back !</a></p>

        </div>
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