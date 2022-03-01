<?php 
require "connection.php";
$errormessage = "";

if ($_GET["login"] == -1) {
    setcookie("userid", $row["id"], time()-3600 , "/" );
    header("location: ../index.php");
}

if (isset($_POST["username"])) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $_POST["username"]);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows != 0) {   
        $hashed = hash("md5", $_POST["password"]);
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $_POST["username"], $hashed);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result -> fetch_assoc();
        if($result->num_rows != 0) {
            setcookie("userid", $row["id"], time()+3600 , "/" );
            header("location: ../index.php");
        } else {
            $errormessage = "onjuist wachtwoord";
        }
    } else {
        $errormessage = "Dit account bestaat niet";
    }
}

if (isset($_POST["newusername"])) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $_POST["newusername"]);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 0) {   
        $hashed = hash("md5", $_POST["newpassword"]);

    } else {
        $errormessage = "Dit account bestaat al";
    }
}
?>