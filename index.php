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
                <?php if (isset($_COOKIE["superuser"]) == 1) { ?>  
                    <a class="urls" href="pages/admin.php">Admin</a>
                <?php } ?>
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
                <h1><?php echo $_COOKIE["username"]; ?>, Uw lijsten <span class="header-new"><a class="urls" href="pages/list.php?list=1&task=0&new=1">Nieuwe lijst + </a></span></h1>
            </div>
            <div id="lists">
                <?php for ($i = 0; $i < count($listrows); $i++) { ?>
                    <div id="list">
                        <h2><?= $listrows[$i]["title"] ?> <span class="list-edit"><a class="urls" href="pages/list.php?list=1&task=0&new=0&id=<?= $listrows[$i]["id"] ?>">Edit</a></span></h2>
                        <p><?= strlen($listrows[$i]["description"]) > 0 ? $listrows[$i]["description"] : "Geen description" ?></p>
                        <a class="urls task-add" href="pages/task.php?list=0&task=1&new=1&listid=<?php echo $listrows[$i]["id"] ?>">+</a>
                        <div id="tasks">
                            <?php for ($j = 0; $j < count($listrows[$i]["tasks"]); $j++) { ?>
                                <div id="task">
                                    <h3></h3>
                                </div>
                            <?php } ?>
                        <!-- <?php for ($j = 0; $j < count($taskrows); $j++) { ?>
                            <div id="task">
                                <h3><?= $taskrows[$j]["description"] ?><span class="task-edit"><a class="urls" href="pages/task.php?new=0&id=<?= $taskrows[$j]["id"] ?>">Edit</a></span></h3>
                                <h3>Status: <?= $taskrows[$j]["status"] ?></h3>
                                <h3>Time: <?= $taskrows[$j]["time"] ?> Minuten</h3>
                            </div>
                        <?php } ?> -->
                        </div>
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
        <a class="urls" href="https://github.com/99062653" target="_blank">Rick Huisman &copy; <?= date("Y"); ?></a>
    </footer>
</body>

</html>