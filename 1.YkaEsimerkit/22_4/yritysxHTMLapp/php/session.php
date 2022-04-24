<?php
/**
 *  file:   php/session.php 
 *  desc:   Hakee GET-muuttujan userid perusteella tietoa users -taulusta
 */
header('Access-Control-Allow-Origin: *');  //mahdollistaa kutsun eri verkko-osoitteista
include('dbConnect.php');
$sql='SELECT UserID, Etunimi, Sukunimi FROM users WHERE UserID='.$_GET['userid'];
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
    //löytyi UserID:n perusteella rivi, poimitaan tiedot -> tulostetaan JSON-muodossa pyytävälle ohjelmalle
    $rivi=$tulos->fetch_assoc();
    echo '{"Status":"OK", "Kayttaja":"'.$rivi['Etunimi'].' '.$rivi['Sukunimi'].'"}';
}else echo '{"Status":"Virhe"}';
?>