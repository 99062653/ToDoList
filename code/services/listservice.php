<?php 
require "code/connection.php";

if (!isset($_COOKIE["userid"])) {
    $stmt = $conn->prepare("SELECT * FROM list WHERE userid = ?");
    $stmt->bind_param("s", $_COOKIE["userid"]);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); 
}

?>