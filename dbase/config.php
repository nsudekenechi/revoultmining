<?php
$username = "root";
$password = "";
$db = "Zenixmining";
$host = "localhost";
$conn = mysqli_connect($host, $username, $password, $db);
if (!$conn) {
    echo "Couldn't connect to DB";
    exit();
}