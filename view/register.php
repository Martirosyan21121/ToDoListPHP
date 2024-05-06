<?php

session_start();

session_unset();

session_destroy();

$email_exist = '';
if (isset($_GET['error']) && $_GET['error'] === 'email_exist') {
    $email_exist = 'Email already exists.';
} else if (isset($_GET['error']) && $_GET['error'] === 'invalid_email') {
    $email_exist = 'Invalid email.';
}

$username_length = '';
if (isset($_GET['error']) && $_GET['error'] === 'min_length') {
    $username_length = "Username minimum length must be at least 5 characters.";
}

$password_p = '';
if (isset($_GET['error']) && $_GET['error'] === 'password_pattern') {
    $password_p = "Password need to be least 8 characters must be used letters(uppercase and lowercase), numbers and symbols. ";
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Register page</title>
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
    <h1>Please register</h1>
    <div class="main-agileinfo">
        <div class="agileits-top">

            <form action="../registerData/register_logic.php" method="post" enctype="multipart/form-data">
                <input class="text" type="text" name="username" placeholder="Username" required="">
                <?php if (!empty($username_length)) { ?>
                    <p style="color: red;"><?php echo $username_length; ?></p>
                <?php } ?>
                <input class="text email" type="email" name="email" placeholder="Email" required="">
                <?php if (!empty($email_exist)) { ?>
                    <p style="color: red;"><?php echo $email_exist; ?></p>
                <?php } ?>
                <input class="text" type="password" name="password" placeholder="Password" required="">
                <?php if (!empty($password_p)) { ?>
                    <p style="color: red;"><?php echo $password_p; ?></p>
                <?php } ?>
                <br>
                <div class="file-input-container">
                    <label for="file-input" class="custom-file-upload">
                        Choose Picture
                    </label>
                    <input id="file-input" type="file" name="user_image" onchange="updateFileName(this)">
                    <span id="file-name"></span>
                </div>
                <input type="submit" value="REGISTER">
            </form>

            <p>You have an Account? <a href="../index.php"> Login Now!</a></p>

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
<script>
    function updateFileName(input) {
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