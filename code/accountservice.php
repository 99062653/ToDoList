<?php
require "connection.php";

$errormessage = "";
if (isset($_POST["username"])) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("i", $_POST["username"]);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows != 0) {
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($result->num_rows != 0) {
            setcookie("user", $row["username"], time()+3600 , "/" );
            setcookie("userid", $row["id"], time()+3600 , "/" );
            setcookie("superuser", $row["superuser"], time()+3600 , "/" );

            header("location: ../index.php");
        } else {
            $errormessage = "Onjuist wachtwoord";
        }
    } else {
        $errormessage = "Dit account bestaat niet";
    }
}
