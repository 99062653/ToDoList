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

    <h1>Uw lijsten</h1>
    <?php if (!isset($user)) { ?>
        <p><a class="urls" href="code/pages/login.php">Login</a></p>
    <?php } else { ?>
        <p><?php $user['name'] ?></p>
    <?php } ?>

    <?php require "code/imports/footer.php" ?>
</body>
</html>