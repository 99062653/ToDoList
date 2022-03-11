<?php
require "../code/services/taskservice.php";
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
                <input required type="text" name="newdescription" value="<?php echo isset($_POST["newdescription"]) ? $_POST["newdescription"] : '' ?>">*<br>
                <label for="newstatus">Status:</label>
                <select name="newstatus">
                    <option value="done">Done</option>
                    <option value="Not done">Not done</option>
                    <option value="WIP">WIP</option>
                    <option value="Failed">Failed</option>
                </select><br>
                <label for="newtime">Time:</label>
                <input required type="number" name="newtime" value="<?php echo isset($_POST["newtime"]) ? $_POST["newtime"] : '' ?>">*
                <p id="error"><?php echo $errormessage ?></p>
                <a href="../index.php"><input type="button" value="Terug"></a>
                <input type="submit" value="Add">
            </form>
        </div>
    <?php } else if ($_GET["new"] == 0) { ?>

    <?php } ?>
</body>

</html>