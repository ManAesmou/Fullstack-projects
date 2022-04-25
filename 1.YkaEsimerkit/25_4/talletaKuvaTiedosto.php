<?php
/**
 *  file:   talletaKuvaTiedosto.php
 *  desc:   Lataa tiedoston palvelimelle ja tallentaa kansioon "tiedostot". Tarkistaa, että tiedosto on 
 *          kuvatiedosto
 */
$tiedosto=basename($_FILES['tiedosto']['name']); //FILES-listan "tiedosto" -kentältä tiedoston oikea nimi
$talletuspolku='tiedostot/';
$tiedostotyyppi=strtolower(pathinfo($tiedosto,PATHINFO_EXTENSION)); //poimii tiedostotyypin
clearstatcache();
$uploadOk=1;  //tätä arvoa käytetään checkImageFile.inc -tiedoston koodissa
include('checkImageFile.inc'); //tarkistusfunktio kuvalle
if($uploadOk==0){
    //kuvatiedosto oli vääränlainen
    header("location: lomake.php?virhe=true&viesti=$viesti");
}else{
 //kuvatiedosto oli oikeanlainen
 if(move_uploaded_file($_FILES['tiedosto']['tmp_name'],$talletuspolku.$tiedosto)){
    //tiedosto tallentui kohteeseen
    header("location: lomake.php?virhe=false&viesti=$viesti");
    
 }else header('location: lomake.php?virhe=true&viesti=ei tallentunut');
}
?>