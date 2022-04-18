<?php
/*
    file:   index.php
    desc:   Sovelluksen pääsivu. Sivu näytetään, jos nimi ja email löytyvät cookiestiedoista.
            Jos ko tietoja ei ole, mennään aloita.php:lle. 
            Estetään sovelluksen sivujen tallentuminen välimuisteihin -> sovelluksen sivut
            haetaan aina palvelimelta.
*/
if(isset($_COOKIE['nimi'])) $nimi=$_COOKIE['nimi']; else header('location: aloita.php');
if(isset($_COOKIE['email'])) $email=$_COOKIE['email']; else header('location: aloita.php');
if(isset($_COOKIE['laskuri'])) $laskuri=$_COOKIE['laskuri'];else $laskuri=1;
setcookie('laskuri',$laskuri+1,0); //säilytysaika 0 eli vanhenee, kun selain suljetaan
//otetaan session käyttöön
session_start();
//välimuistituksen esto ennen sivun näyttämistä
header('Cache-control:no-cache, no-store, must-revalidate');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cookies ja Session esimerkki</title>
    </head>
    <body>
        <p><small>Käyttäjä: <?php echo $email?></small></p>
        <p><b>Etusivu</b> <a href="tokasivu.php">Toinen sivu</a> <a href="lopeta.php">Lopeta</a></p>
        <h3>Cookies ja session esimerkki, etusivu</h3>
        <p>Terve <?php echo $nimi?>! Olet tullut etusivulle.</p>
        <p>Tämän sovelluksen käytön aikana olet ladannut sivuja <?php echo $laskuri?> kertaa.</p>
        <p></p>
        <p>Kirjauduit sovellukseen <?php echo $_SESSION['alkuaika']?></p>
    </body>
</html>