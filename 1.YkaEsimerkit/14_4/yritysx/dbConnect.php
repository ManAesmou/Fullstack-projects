<?php
/**
 *  file:   dbConnect.php
 *  desc:   Tietokantayhteys MySQL-palvelimella olevaan yritysx-tietokantaan
 */
$palvelin='localhost';
$tietokanta='yritysx';
$dbUser='yritysx';
$dbPassword='yritysX2022huhti';

//määritellään mysqli-objektilla tietokantayhteys
$conn=new mysqli($palvelin, $dbUser,$dbPassword,$tietokanta);

//Tarkistus toimiiko yhteys
if($conn->connect_error) die('Tietokantayhteys ei toimi');

//merkistön määrittely
mysqli_set_charset($conn, 'utf8');
?>