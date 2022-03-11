<?php 
require "../code/connection.php";
$errormessage = "";

if ($_GET["new"] == 1) {
    if (isset($_POST["newdescription"])) {
        if (strlen($_POST["newdescription"]) > 3) {
            if (strlen($_POST["newtime"]) >= 2) {
                $stmt = $conn->prepare("INSERT INTO task (description, status, time, listid) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssii", $_POST["newdescription"], $_POST["newstatus"], $_POST["newtime"], $_GET["listid"]);
                $stmt->execute();
    
                header("location: ../index.php");
            } else {
                $errormessage = "Time moet 2 nummers bevatten";
            }
        } else {
            $errormessage = "Description moet langer zijn dan 3 chars";
        }
    }
}

?>