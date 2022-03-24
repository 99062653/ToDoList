<?php
require "../code/services/listandtaskservice.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>LIST</title>
</head>

<body>
    <?php if ($_GET["new"] == 1) { ?>
        <div id="form">
            <form action="" method="post">
                <label for="newtitle">Title:</label>
                <input required type="text" name="newtitle" value="<?= isset($_POST["newtitle"]) ? $_POST["newtitle"] : '' ?>">*<br>
                <label for="newdescription">Description:</label>
                <input type="text" name="newdescription" value="<?= isset($_POST["newdescription"]) ? $_POST["newdescription"] : '' ?>"><br>
                <p id="error"><?= $errormessage ?></p>
                <a href="../index.php?page=home"><input type="button" value="Terug"></a>
                <input type="submit" value="Add">
            </form>
        </div>
    <?php } else if ($_GET["new"] == 0) { ?>
        <div id="form">
            <form action="" method="post">
                <label for="title">Title:</label>
                <input required type="text" name="title" value="<?= $title ?>">* <div id="Delete">X</div><br>
                <label for="description">Description:</label>
                <input type="text" name="description" value="<?= $description ?>"><br>
                <p id="error"><?= $errormessage ?></p>
                <a href="../index.php?page=home"><input type="button" value="Terug"></a>
                <input type="submit" value="Edit">
            </form>
        </div>
        <div id="popUp" style="display: none;">
            <form action="" method="post">
                <h1>Lijst verwijderen?</h1>

                <input id="yesButton" type="submit" name="delete" value="Ja"></input>
                <button id="noButton" name="no" value="Nee">Nee</button>
            </form>
        </div>
    <?php } ?>
</body>

<script src="../js/deletepopup.js"></script>
</html>