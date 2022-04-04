<?php
error_reporting(E_ERROR | E_PARSE); //zet alle warnings uit :)
$servername = "free-tier13.aws-eu-central-1.cockroachlabs.cloud:26257";
$username = "rick";
$password = "-j7QkZdjLknQ3_A8HPwbhw";

$conn = new mysqli($servername, $username, $password, "todolistdb-766.defaultdb");
