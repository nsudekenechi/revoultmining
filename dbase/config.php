<?php
$username = "root";
$password = "";
$db = "revoultmining";
$host = "localhost";
$conn = mysqli_connect($host, $username, $password, $db);
if (!$conn) {
    echo "Couldn't connect to DB";
    exit();
}