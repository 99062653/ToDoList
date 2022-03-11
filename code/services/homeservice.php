<?php 
require "code/connection.php";

$stmt = $conn->prepare("SELECT * FROM list WHERE userid = ?");
$stmt->bind_param("i", $_COOKIE["userid"]);
$stmt->execute();

$listresult = $stmt->get_result();
$listrow = $listresult->fetch_assoc();

?>