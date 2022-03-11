<?php 
require "code/connection.php";

$stmt = $conn->prepare("SELECT * FROM list WHERE userid = ?");
$stmt->bind_param("i", $_COOKIE["userid"]);
$stmt->execute();

$listresult = $stmt->get_result();
$listrows = mysqli_fetch_all($listresult, MYSQLI_ASSOC);

$stmt = $conn->prepare("SELECT * FROM task WHERE listid = ?");
$stmt->bind_param("i", $listrows[0]["id"]);
$stmt->execute();

$taskresult = $stmt->get_result();
$taskrows = mysqli_fetch_all($taskresult, MYSQLI_ASSOC);

?>