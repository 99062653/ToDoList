<?php
require "../code/services/listservice.php";
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
                <input required type="text" name="newtitle" value="<?php echo isset($_POST["newtitle"]) ? $_POST["newtitle"] : '' ?>">*<br>
                <label for="newdescription">Description:</label>
                <input type="text" name="newdescription" value="<?php echo isset($_POST["newdescription"]) ? $_POST["newdescription"] : '' ?>"><br>
                <p id="error"><?php echo $errormessage ?></p>
                <a href="../index.php"><input type="button" value="Terug"></a>
                <input type="submit" value="Add">
            </form>
        </div>
    <?php } else if ($_GET["new"] == 0) { ?>
        
    <?php } ?>
</body>

</html>