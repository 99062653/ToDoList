<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>To Do List</title>
</head>
<body>
    <?php require "code/imports/header.php" ?>
    <div id="container">
        <?php if (!isset($user)) { ?>
            <p>U bent niet ingelogd</p>
            <a class="urls" href="code/pages/login.php">Login</a>
        <?php } else { ?>
            <p><?php $user['name'] ?></p>
        <?php } ?>
    </div>
    <?php require "code/imports/footer.php" ?>
</body>
</html>