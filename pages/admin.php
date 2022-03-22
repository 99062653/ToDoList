<?php
if (isset($_COOKIE["userid"])) {
    require "../code/services/adminservice.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>To Do List</title>
</head>

<body>
    <header>
        <img class="logo" src="../img/logo.png" alt="Logo">
        <div id="header-buttons">
            <?php if (isset($_COOKIE["admin"]) == 1) { ?>
                <a class="urls" href="../index.php">Home</a>
            <?php } ?>
        </div>
    </header>
    <div id="container">
        <div id="header-container">
            <h1><?php echo $_COOKIE["username"]; ?>, **ALLE** lijsten <span class="header-new"><a class="urls" href="pages/list.php?list=1&task=0&new=1">Nieuwe lijst + </a></span></h1>
        </div>
        <div id="lists">
            <?php for ($i = 0; $i < count($listrows); $i++) { ?>
                <div id="list">
                    <h2><?= $listrows[$i]["title"] ?> <span class="list-edit"><a class="urls" href="pages/list.php?list=1&task=0&new=0&id=<?= $listrows[$i]["id"] ?>">Edit</a></span></h2>
                    <p><?= strlen($listrows[$i]["description"]) > 0 ? $listrows[$i]["description"] : "Geen description" ?></p>
                    <p>Created by <?= $listrows[$i]["madeby"] ?></p>
                    <button class="urls task-sort" onclick="displaySort(<?= $listrows[$i]["id"] ?>)">Sort</button><a class="urls task-add" href="pages/task.php?list=0&task=1&new=1&listid=<?php echo $listrows[$i]["id"] ?>">+</a>
                    <form id="sort-<?= $listrows[$i]["id"] ?>" class="sorts" method="post">
                        <input type="text" name="sortlistid" value="<?= $listrows[$i]["id"] ?>" hidden>
                        <select name="sort-time">
                            <option value="unset">Tijd</option>
                            <option value=">"> > </option>
                            <option value="<"> < </option>
                        </select>
                        <input type="submit" value="Sorteer">
                    </form>
                    <div id="tasks">
                        <?php foreach ($listrows[$i]["tasks"] as $tasks) { ?>
                            <div id="task">
                                <h3><?= $tasks["description"] ?><span class="task-edit"><a class="urls" href="pages/task.php?list=0&task=1&new=0&id=<?= $tasks["id"] ?>">Edit</a></span></h3>
                                <h3>Status: <?= $tasks["status"] ?></h3>
                                <h3>Time: <?= $tasks["time"] ?></h3>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <footer>
            <a class="urls" href="https://github.com/99062653" target="_blank">Rick Huisman &copy; <?= date("Y"); ?></a>
        </footer>
</body>
<script src="js/sortpopup.js"></script>

</html>