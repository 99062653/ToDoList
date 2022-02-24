<?php 
require "../code/accountservice.php"
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
    <div id="form">
        <form action="" method="post">
            <label for="username">Username:</label>
            <input required type="text" name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : '' ?>" ><br>
            <label for="password">Password:</label>
            <input required type="password" name="password"><br>
            <a href="../index.php"><input type="button" value="Terug"></a>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>