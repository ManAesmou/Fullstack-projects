<?php
/**
 *  file:   haeUsers.php
 *  desc:   Hakee users-taulusta tiedot
 */
header('Access-Control-Allow-Origin: *');  //mahdollistaa kutsun eri verkko-osoitteista
if(isset($_GET['start'])) $start=$_GET['start']; else $start=0; //mistä kohtaa tulostus alkaa
$montako=3;
include('dbConnect.php');
$sql="SELECT * FROM users ORDER BY Sukunimi, Etunimi LIMIT $start,$montako";
$tulos=$conn->query($sql);
$JSON=array(); //käytetään JSON-datan tulostamiseen
while($rivi=$tulos->fetch_assoc()){
    $JSON[]=$rivi;
}
//lasketaan montako riviä users-taulussa on -> sivutuksen vuoksi
$sql='SELECT count(userID) as Lkm FROM users';
$tulos=$conn->query($sql);
$rivi=$tulos->fetch_assoc();
$lkm=$rivi['Lkm']; //montako riviä tietokannan taulussa on
$sivuja=ceil($lkm / $montako);
$sivu=($start+$montako)/$montako;
if($start+$montako>=$lkm) $seuraava=$start; else $seuraava=$start+$montako;
$conn->close();
$start=$seuraava;
$vastaus='{"start":"'.$start.'","montako":"'.$montako.'","sivuja":"'.$sivuja.'","sivu":"'.$sivu.'","users":'.json_encode($JSON).'}'; //muokataan array-muotoinen tieto JSON-muotoon
echo $vastaus;
?>