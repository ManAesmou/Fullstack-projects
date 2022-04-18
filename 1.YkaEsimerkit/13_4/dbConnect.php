<?php
/**
 *  file:   dbConnect.php
 *  desc:   Määritellään tietokantayhteys. Tätä skriptiä käyttävät sovelluksen kaikki muut osat (skriptit).
 *          HUOM! Tässä tiedossa näkyy käyttäjätunnus ja salasana -> ei koskaan saa käyttää root-tunnusta
 *          Aina täytyy luoda tietokannalle sovelluskohtainen käyttäjätunnus ja rajoittaa ko tunnuksen
 *          käyttöoikeudet - tyypillisesti vain select, update, insert ja delete eli tiedon käsittely * 
 */
//Mikä palvelin -> Webbipalvelimen näkökulmasta MySQL sijaitsee localhost-palvelimella
$palvelin='localhost'; //voisi olla muualla sijaitseva: osoite esim https:/pavelimennimi
$tietokanta='cars'; //tietokannan nimi
$dbUser='autosovellus'; //MySQL-palvelimella määritelty tietokantakohtainen käyttäjätunnus
$dbPassword='autosovellus'; //MySQL-palvelimella määritelty tietokantakohtaisen tunnuksen salasana

//määritellään mysqli-objektilla tietokantayhteys
$conn=new mysqli($palvelin, $dbUser,$dbPassword,$tietokanta);

//tarkistetaan, että yhteys toimii
if($conn->connect_error) die('Tietokantayhteys ei toimi!');

//Merkkimuunnosten vuoksi -> mitä merkistöä tietokantyhteys käyttää
mysqli_set_charset($conn,'utf8');
?>