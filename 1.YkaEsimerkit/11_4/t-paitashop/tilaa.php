<?php
/*
    file:   tilaa.php
    desc:   T-paitatilauksen käsittely. Tarkistuksia demonstroidaan!
*/
//tarkistetaan, että käyttäjä tulee lomakkeelta POST-metodilla
if(empty($_POST)) header('location: index.php');
else
{
    //jos edelliseltä riviltä ei hypätty toiseen sivuun, jatkuu tästä eli tultiin lomakkeelta
    $virhe=false; //aluksi tilaksi ei virhettä -> tämän avulla kerrotaan käyttäjälle virheistä

    //tarkistetaan, että koko on valittu
    if(empty($_POST['koko']))
    {
        $virhe=true; //koko puuttui eli syntyy virhe
        $koko='virhe'; //tätä tietoa käytetään tuolla index.php -sivulla
    }
    else $koko=$_POST['koko']; //koko tuli ja se luettiin muuttujalle

    //tarkistetaan, että väri (color) on valittu
    if(empty($_POST['color']))
    {
        $virhe=true; //color puuttui eli syntyy virhe
        $color='virhe'; //tätä tietoa käytetään tuolla index.php -sivulla
    }
    else $color=$_POST['color']; //color tuli ja se luettiin muuttujalle

    //tarkistetaan sähköpostiosoite, että se on oikeasti mahdollinen
    include('checkEmail.inc'); //otetaan emailin tarkistusfunktio käyttöön
    if(validEmail($_POST['email']))
    {
        //tarkistaa, että emailin @domainosa on oikeasti olemassa
        $email=$_POST['email'];
    }else
    {
        $virhe=true; //email oli väärin eli domainosa virheellinen
        $email='virhe';
    }

    //tarkistetaan nimi, osoite ja kpl (eivät tyhjiä)
    if(empty($_POST['nimi']))
    {
        $virhe=true;
        $nimi='virhe';
    }else $nimi=$_POST['nimi'];
    if(empty($_POST['osoite']))
    {
        $virhe=true;
        $osoite='virhe';
    }else $osoite=$_POST['osoite'];
    if(empty($_POST['maara']))
    {
        $virhe=true;
        $maara='virhe';
    }else $maara=$_POST['maara'];

    //kaikki kentät tarkistettu -> jos tuli virhe, mennään index.php:lle takaisin
    //muuten näytetään sivu
    if($virhe) header("location: index.php?virhe=true&koko=$koko&color=$color&email=$email&nimi=$nimi&osoite=$osoite&maara=$maara");
    else
    {
        //näytetään tilaustietoja ja "Vahvista tilau" -painike
        ?>
        <!DOCTYPE html>
        <html>
            <head>
	            <meta charset="utf-8">
	    		<title>WebShop</title>
        	</head>
        	<body>
                <h3>Tilauksesi</h3>
                <p>Tilauksesi:</p>
                <?php
                echo "<p>T-paita, koko: $koko, väri: $color, kpl: $maara</p>";
                ?>
            </body> 
        </html>
        <?php
    }
}
?>