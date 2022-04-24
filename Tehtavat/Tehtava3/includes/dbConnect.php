<?php
/*
  file:   dbConnect.php
  desc:   Tietokantayhteys MySQL-palvelimella olevaan presidentit-tietokantaan
 */

$dbHost = "localhost";
$dbUser = "presidenttisovellus";
$dbPass = "S4ul1N11nistö789";
$dbName = "presidentit";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if($conn->connect_error) die('Tietokantayhteys ei toimi');

mysqli_set_charset($conn, 'utf8');
?>