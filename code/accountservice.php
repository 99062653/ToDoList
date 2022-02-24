<?php 
require "connection.php";

if (isset($_POST["username"])) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("i", $_POST["username"]);
    $stmt->execute();
    
    $result = $stmt->get_result();

    if ($result->num_rows != 0) {
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("i", $_POST["username"]);
        $stmt->bind_param("b", $_POST["password"]);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows != 0) {

        } else {
            echo "onjuist wachtwoord"; 
        }
    } else {
        echo "geen account gevonden";
    }
}

?>