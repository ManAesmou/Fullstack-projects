<?php
/**
 *  file:   talletaPDFTiedosto.php
 *  desc:   Lataa tiedoston palvelimelle ja tallentaa kansioon "tiedostot". Tarkistaa, että tiedoston tyyppi on .pdf
 */
$tiedosto=basename($_FILES['tiedosto']['name']); //FILES-listan "tiedosto" -kentältä tiedoston oikea nimi
$tiedosto=time().'_'.$tiedosto; //lisätään aikaleima ja alaviiva alkuun
$talletuspolku='tiedostot/';
$tiedostotyyppi=strtolower(pathinfo($tiedosto,PATHINFO_EXTENSION)); //poimii tiedostotyypin
if($tiedostotyyppi!="pdf") header('location: lomake.php?virhe=true&viesti=Ei pdf tiedosto');
else{
 //tiedosto oli pdf-tyyppinen, talletetaan
 if(move_uploaded_file($_FILES['tiedosto']['tmp_name'],$talletuspolku.$tiedosto)){
    //tiedosto tallentui kohteeseen
    header('location: lomake.php?virhe=false&viesti=ok');
 }else header('location: lomake.php?virhe=true&viesti=ei tallentunut');
} 
?>