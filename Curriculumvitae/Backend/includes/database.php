<?php

//Params to connect to a database
$dbHost = "localhost";
$dbUser = "testaaja1";
$dbPass = "testaaja";
$dbName = "ismomanninen";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database connection failed!");
}

?>
