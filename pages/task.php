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
    <title>TASK</title>
</head>

<body>
    <?php if ($_GET["new"] == 1) { ?>
        <div id="form">
            <form action="" method="post">
                <label for="newdescription">Description:</label>
                <input required type="text" name="newdescription" value="<?= isset($_POST["newdescription"]) ? $_POST["newdescription"] : '' ?>">*<br>
                <label for="newstatus">Status:</label>
                <select name="newstatus" value="<?= isset($_POST["newstatus"]) ? $_POST["newstatus"] : '' ?>">
                    <option value="done">Done</option>
                    <option value="Not done">Not done</option>
                    <option value="WIP">WIP</option>
                    <option value="Failed">Failed</option>
                </select><br>
                <label for="newtime">Time:</label>
                <input required type="number" name="newtime" value="<?= isset($_POST["newtime"]) ? $_POST["newtime"] : '' ?>">*
                <p id="error"><?= $errormessage ?></p>
                <a href="../index.php"><input type="button" value="Terug"></a>
                <input type="submit" value="Add">
            </form>
        </div>
    <?php } else if ($_GET["new"] == 0) { ?>
        <div id="form">
            <form action="" method="post">
            <label for="description">Description:</label>
                <input required type="text" name="description" value="<?= $description ?>">* <div id="Delete">X</div><br>
                <label for="status">Status:</label>
                <select name="status"  value="<?= $status ?>">>
                    <option value="done">Done</option>
                    <option value="Not done">Not done</option>
                    <option value="WIP">WIP</option>
                    <option value="Failed">Failed</option>
                </select><br>
                <label for="time">Time:</label>
                <input required type="number" name="time" value="<?= $time ?>">*
                <p id="error"><?= $errormessage ?></p>
                <a href="../index.php"><input type="button" value="Terug"></a>
                <input type="submit" value="Edit">
            </form>
        </div>
        <div id="popUp" style="display: none;">
            <form action="" method="post">
                <h1>TaskVerwijderen?</h1>

                <input id="yesButton" type="submit" name="delete" value="Ja"></input>
                <button id="noButton" name="no" value="Nee">Nee</button>
            </form>
        </div>
    <?php } ?>
</body>

<script src="../js/deletepopup.js"></script>
</html>