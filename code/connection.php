<?php
error_reporting(E_ERROR | E_PARSE); //zet alle warnings uit :)
$servername = "localhost:3307";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "todolistdatabase");
?>