<?php 
require "../code/connection.php";
$errormessage = "";

if ($_GET["new"] == 1) {
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
}

$title = "";
$description = "";
if ($_GET["new"] == 0) {
    if (isset($_GET["id"])) {
        $stmt = $conn->prepare("SELECT title, description FROM list WHERE id = ?");
        $stmt->bind_param("i", $_GET["id"]);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $title = $row["title"];
        $description = $row["description"];
    } else {
        $errormessage = "Kon lijst niet laden";
    }

    if (isset($_POST["title"])) {
        if (strlen($_POST["title"]) > 5) {
            $stmt = $conn->prepare("UPDATE list SET title = ?, description = ? WHERE id = ?");
            $stmt->bind_param("ssi", $_POST["title"], $_POST["description"], $_GET["id"]);
            $stmt->execute();

            header("location: ../index.php");
        } else {
            $errormessage = "Title moet minimaal 5 characters hebben";
        }
    }
}

?>