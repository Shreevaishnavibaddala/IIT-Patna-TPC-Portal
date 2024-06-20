<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "Anudeep@2003";
$dbName = "dblab8";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>