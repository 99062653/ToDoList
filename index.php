<?php
if (isset($_COOKIE["userid"])) {
    require "code/services/homeservice.php";
}

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
            <div id="header-container">
                <h1><?php echo $_COOKIE["username"]; ?>, Uw lijsten <span class="header-new"><a class="urls" href="pages/list.php?new=1">Nieuwe lijst + </a></span></h1>
            </div>
            <div id="lists">
                <?php while($list = $result->fetch_assoc()) { ?>
                    <div id="list">
                        <h2><?php echo $list["title"] ?> <span class="list-edit"><a class="urls" href="pages/list.php?new=0&id=<?php echo $list["id"] ?>">Edit</a></span></h2>
                        <p><?php echo $list["description"] ?></p>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div id="header-container">
                <h1>Login of Sign up!</h1>
            </div>
        <?php } ?>
    </div>
    <footer>
        <a class="urls" href="https://github.com/99062653" target="_blank">Rick Huisman &copy; <?php echo date("Y"); ?></a>
    </footer>
</body>

</html>