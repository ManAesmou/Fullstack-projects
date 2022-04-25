<?php
/**
 *  file:   talletaPieniTiedosto.php
 *  desc:   Lataa tiedoston palvelimelle ja tallentaa kansioon "tiedostot". Tarkistaa, että tiedosto ei ole jo
 *          olemassa talletuskansiossa. Tiedoston maksimikoko 50000 bytes
 */
$tiedosto=basename($_FILES['tiedosto']['name']); //FILES-listan "tiedosto" -kentältä tiedoston oikea nimi
$talletuspolku='tiedostot/';
$virhe=false;
//tarkistetaan, että tiedosto ei ole jo olemassa
clearstatcache(); //tyhjentää tiedoston/hakemistonkäsittelyfunktioiden välimuistin
if(file_exists($talletuspolku.$tiedosto)){
    //tiedosto löytyi talletuskansiosta
    $virhe=true;
    header('location: lomake.php?virhe=true&viesti=Tiedosto on olemassa');
}
//tarkistetaan tiedoston koko
if($_FILES['tiedosto']['size'] > 50000){
    //tiedosto yli 50000 tavua (bytes)
    $virhe=true;
    header('location: lomake.php?virhe=true&viesti=Tiedosto liian suuri');
}
if(!$virhe){
 if(move_uploaded_file($_FILES['tiedosto']['tmp_name'],$talletuspolku.$tiedosto)){
    //tiedosto tallentui kohteeseen
    header('location: lomake.php?virhe=false&viesti=ok');
 }else header('location: lomake.php?virhe=true&viesti=ei tallentunut');
}
?>