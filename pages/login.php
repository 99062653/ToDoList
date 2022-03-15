<?php
require "../code/services/loginservice.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>LOGIN</title>
</head>

<body>
    <?php if ($_GET["login"] == 1) { ?>
        <div id="form">
            <form action="" method="post">
                <label for="username">Username:</label>
                <input required type="text" name="username" value="<?= isset($_POST["username"]) ? $_POST["username"] : '' ?>">*<br>
                <label for="password">Password:</label>
                <input required type="password" name="password">*<br>
                <p id="error"><?= $errormessage ?></p>
                <a href="../index.php"><input type="button" value="Terug"></a>
                <input type="submit" value="Login">
            </form>
        </div>
    <?php } elseif ($_GET["login"] == 0) { ?>
        <div id="form">
            <form action="" method="post">
                <label for="newusername">Username:</label>
                <input required type="text" name="newusername" value="<?= isset($_POST["newusername"]) ? $_POST["newusername"] : '' ?>">*<br>
                <label for="newpassword">Password:</label>
                <input required type="password" name="newpassword">*<br>
                <p id="error"><?= $errormessage ?></p>
                <a href="../index.php"><input type="button" value="Terug"></a>
                <input type="submit" value="Sign up">
            </form>
        </div>
    <?php } ?>
</body>

</html>