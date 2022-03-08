<?php 
require "code/services/listservice.php";

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
    <header> 
        <img class="logo" src="img/logo.png" alt="Logo">
        <div id="header-buttons">
            <?php if (isset($_COOKIE["userid"])) { ?>
                <a class="urls" href="pages/login.php?login=-1">Logout</a>
            <?php } else { ?>
                <a id="login-button" class="urls" href="pages/login.php?login=1">Login</a>
                <a id="signup-button" class="urls" href="pages/login.php?login=0">Get Started</a>
            <?php } ?>
        </div>
    </header>
    <div id="container">
        <?php if (isset($_COOKIE["userid"])) { ?>
            <h1>Welkom terug <?php echo $_COOKIE["username"]; ?></h1>
        <?php } else { ?>

        <?php } ?>
    </div>
    <footer>
        <a class="urls" href="https://github.com/99062653" target="_blank">Rick Huisman &copy; <?php echo date("Y"); ?></a>
    </footer>
</body>
</html>