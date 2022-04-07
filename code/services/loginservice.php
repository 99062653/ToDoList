<?php 
require "../code/connection.php";
$errormessage = "";

if ($_GET["login"] == -1) {
    setcookie("userid", $row["id"], time()-3600 , "/" );
    setcookie("username", $row["username"], time()-3600 , "/" );
    setcookie("admin", $row["superuser"], time()-3600 , "/" );
    header("location: ../index.php");
}

if ($_GET["login"] == 1) {
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
            $row = $result->fetch_assoc();
            if($result->num_rows != 0) {
                setcookie("userid", $row["id"], time()+3600 , "/" );
                setcookie("username", $row["username"], time()+3600 , "/" );
                setcookie("admin", $row["superuser"], time()+3600 , "/" );
                header("location: ../index.php?page=home");
            } else {
                $errormessage = "onjuist wachtwoord";
            }
        } else {
            $errormessage = "Dit account bestaat niet";
        }
    }
}

if ($_GET["login"] == 0) {
    if (isset($_POST["newusername"])) {
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $_POST["newusername"]);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows == 0) {   
            if (strlen($_POST["newusername"]) <= 15 && strlen($_POST["newpassword"]) >= 8 && strlen($_POST["newpassword"]) < 15) {
                if(preg_match("/\W/", $_POST["newpassword"])) {
                    $hashed = hash("md5", $_POST["newpassword"]);
                    $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
                    $stmt->bind_param("ss", $_POST["newusername"], $hashed);
                    $stmt->execute();

                    $id = $conn->insert_id;
                    setcookie("userid", $id, time()+3600 , "/" );
                    setcookie("username", $_POST["newusername"], time()+3600 , "/" );
                    header("location: ../index.php?page=home");
                } else {
                    $errormessage = "Password moet een special character hebben";
                }
            } else {
                $errormessage = "Password niet korter dan 8 en langer dan 15";
            }
        } else {
            $errormessage = "Dit account bestaat al";
        }
    }
}
?>