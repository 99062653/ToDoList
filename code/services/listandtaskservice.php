<?php 
require "../code/connection.php";
$errormessage = "";

if ($_GET["list"] == 1) {
    if ($_GET["new"] == 1) {
        if (isset($_POST["newtitle"])) {
            if (strlen($_POST["newtitle"]) > 5) {
                $stmt = $conn->prepare("INSERT INTO list (title, description, userid) VALUES (?, ?, ?)");
                $stmt->bind_param("ssi", $_POST["newtitle"], $_POST["newdescription"], $_COOKIE["userid"]);
                $stmt->execute();

                header("location: ../index.php?page=home");
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

                header("location: ../index.php?page=home");
            } else {
                $errormessage = "Title moet minimaal 5 characters hebben";
            }
        }

        if (isset($_POST["delete"])) {
            $stmt = $conn->prepare("DELETE FROM list WHERE id = ?");
            $stmt->bind_param("i", $_GET["id"]);
            $stmt->execute();
        
            
            header("location: ../index.php?page=home");
        }
    }
}

if ($_GET["task"] == 1) {
    if ($_GET["new"] == 1) {
        if (isset($_POST["newdescription"])) {
            if (strlen($_POST["newdescription"]) > 3) {
                if (strlen($_POST["newtime"]) >= 2) {
                    $stmt = $conn->prepare("INSERT INTO task (description, status, time, listid) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("ssii", $_POST["newdescription"], $_POST["newstatus"], $_POST["newtime"], $_GET["listid"]);
                    $stmt->execute();
        
                    header("location: ../index.php?page=home");
                } else {
                    $errormessage = "Time moet 2 nummers bevatten";
                }
            } else {
                $errormessage = "Description moet langer zijn dan 3 chars";
            }
        }
    }

    $description = "";
    $status = "";
    $time = "";
    if ($_GET["new"] == 0) {
        if (isset($_GET["id"])) {
            $stmt = $conn->prepare("SELECT description, status, time FROM task WHERE id = ?");
            $stmt->bind_param("i", $_GET["id"]);
            $stmt->execute();
            
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $description = $row["description"];
            $status = $row["status"];
            $time = $row["time"];
        } else {
            $errormessage = "Kon task niet laden";
        }

        if (isset($_POST["description"])) {
            if (strlen($_POST["description"]) > 3) {
                if (strlen($_POST["time"]) >= 2) {
                    $stmt = $conn->prepare("UPDATE task SET description = ?, status = ?, time = ? WHERE id = ?");
                    $stmt->bind_param("ssii", $_POST["description"], $_POST["status"], $_POST["time"], $_GET["id"]);
                    $stmt->execute();

                    header("location: ../index.php");
                } else {
                    $errormessage = "Time moet 2 nummers bevatten";   
                }
            } else {
                $errormessage = "Description moet langer zijn dan 3 chars";
            }
        }

        if (isset($_POST["delete"])) {
            $stmt = $conn->prepare("DELETE FROM task WHERE id = ?");
            $stmt->bind_param("i", $_GET["id"]);
            $stmt->execute();
        
            
            header("location: ../index.php?page=home");
        }
    }
}

?>