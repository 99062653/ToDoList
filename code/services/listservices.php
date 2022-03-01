<?php 
require "code/connection.php";

$stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("s", $_COOKIE["userid"]);
$stmt->execute();

$result = $stmt->get_result();
$row = $result -> fetch_assoc();

$cock = "test";
?>