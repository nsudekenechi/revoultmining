<?php
$env = "local";
if ($env == "prod") {
    $db = "u779058360_zenixmining_db";
    $username = "u779058360_zenixmining_us";
    $password = "#Zenix1234";
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