<?php
/*
    file:   talletaCookiet.php
    desc:   Tallentaa lomakkeelta tulevat tiedot cookies-kokoelmaan selaimelle
            Sovelluksen sivut voivat käyttää niitä
            Ohjaa sovelluksen etusivulle
*/
if(empty($_POST)) header('location: aloita.php');  //varmistaa, että tullaan aloita.php:n kautta
else{
    //jos nimi ja email eivät tyhjiä -> talteen cookies-tietoihin, muuten takaisin aloita.php:lle
    $virhe=false;
    if(empty($_POST['nimi'])) $virhe=true; else $nimi=$_POST['nimi'];
    if(empty($_POST['email'])) $virhe=true; else $email=$_POST['email'];
    //jos ei virheitä, talletetaan cookiet, muuten takaisin aloita.php:lle
    if($virhe) header('location: aloita.php'); 
    else{
        //talletetaan nimi ja email samannimisill cookie-muuttujilla
        //Cookiet säilytetään 30 vrk (sekunteina aika)
        setcookie('nimi',$nimi,time()+30*24*60*60);
        setcookie('email',$email,time()+30*24*60*60);

        //talletetaan aloitusaika session-muuttujana palvelimelle
        session_start(); //tämän sovelluspolun session-tietojen käyttö aloitetaan
        $_SESSION['alkuaika']=date('H:i:s', time()+60*60); //kellonaikaan tunti lisää

        header('location: index.php');
    }
}
?>