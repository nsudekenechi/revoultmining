<?php
$env = "prod";
if ($env == "prod") {
    $db = "u779058360_db";
    $username = "u779058360_username";
    $password = "e1^]#9f/DH";
    $host = "localhost";
} else {
    $db = "zenixmining";
    $username = "root";
    $password = "";
    $host = "localhost";
}

$conn = mysqli_connect($host, $username, $password, $db);
if (!$conn) {
    echo "Couldn't connect to DB";
    exit();
}