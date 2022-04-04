<?php
error_reporting(E_ERROR | E_PARSE); //zet alle warnings uit :)
$servername = "bnqa8axv6tctp7fcpmdw-mysql.services.clever-cloud.com:3306";
$username = "uohnwczxv7vfgv8d";
$password = "GlbhXfQvZ3wtVCh9ghCZ";

$conn = new mysqli($servername, $username, $password, "todolistdb-766.defaultdb");
