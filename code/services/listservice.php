<?php 
require "../code/connection.php";
$errormessage = "";

if (isset($_POST["newtitle"])) {
    if (strlen($_POST["newtitle"]) > 5) {
        $stmt = $conn->prepare("INSERT INTO list (title, description, userid) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $_POST["newtitle"], $_POST["newdescription"], $_COOKIE["userid"]);
        $stmt->execute();

        header("location: ../index.php");
    } else {
        $errormessage = "Title moet minimaal 5 characters hebben";
    }
}

?>