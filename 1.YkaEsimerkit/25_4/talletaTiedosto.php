<?php
/**
 *  file:   talletaTiedosto.php
 *  desc:   Lataa tiedoston palvelimelle ja tallentaa kansioon "tiedostot". Talletusnimen alkuun lisätään
 *          aikaleima, joten samannimistä tiedostoa ei talletu eikä mene aikaisempien päälle
 */
$tiedosto=basename($_FILES['tiedosto']['name']); //FILES-listan "tiedosto" -kentältä tiedoston oikea nimi
$tiedosto=time().'_'.$tiedosto; //lisätään aikaleima ja alaviiva alkuun
$talletuspolku='tiedostot/';
if(move_uploaded_file($_FILES['tiedosto']['tmp_name'],$talletuspolku.$tiedosto)){
    //tiedosto tallentui kohteeseen
    header('location: lomake.php?virhe=false&viesti=ok');
}else header('location: lomake.php?virhe=true&viesti=ei tallentunut');
?>