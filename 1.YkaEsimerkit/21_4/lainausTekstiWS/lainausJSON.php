<?php
/**
 *  file:   lainausJSON.php
 *  desc:   Palauttaa satunnaisen lainaustekstin tietokannasta JSON-muodosta. 
 *          Aluksi määritellään header, joka mahdollistaa palvelun käytön mistä tahansa verkko-osoitteesta
 * 
 */

//Aluksi määritellään header, joka mahdollistaa palvelun käytön mistä tahansa verkko-osoitteesta
header('Access-Control-Allow-Origin: *');
include('dbConnect.php'); //tietokantayhteys käyttöön
$sql='SELECT * FROM lainaus ORDER BY rand() Limit 1';
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
    //tulostetaan löytynyt rivi JSON-muotoisena tekstinä
    $rivi=$tulos->fetch_assoc();
    echo '{"Status":"OK","Teksti":"'.$rivi['LainausTeksti'].'","Kuka":"'.$rivi['LainausAlkupera'].'"}';
}else{
    //Jostain syystä ei saatu tietoa. Tulostetaan virheilmoitus JSON-muotoisena tekstinä
    echo '{"Status":"Virhe"}';
}
$conn->close();
?>