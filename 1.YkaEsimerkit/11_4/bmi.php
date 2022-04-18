<?php
/*
    file: bmi.php
    desc: Laskee pituuden ja painon perusteella bmi:n ja kertoo huomautuksia
*/
$nimi=$_POST['nimi'];  //scriptin muuttujalle $nimi sijoitetaan lomakkeen kentän nimi arvo
$pituus=$_POST['pituus'];//scriptin muuttujalle $pituus sijoitetaan lomakkeen kentän pituus arvo
$paino=$_POST['paino'];//scriptin muuttujalle $paino sijoitetaan lomakkeen kentän paino arvo
//lasketaan bmi
$bmi=number_format($paino/($pituus*$pituus)*10000,2,','); //lasketaan painoindeksi
//huomautusteksti
if($bmi<20) $huomautus='<p>Olethan aikuinen? Tämä on alle rajojen!</p>';
elseif($bmi<25) $huomautus='<p>Olet normaalipainoinen</p>';
elseif($bmi<30) $huomautus='<p>Oletko kiinnittänyt huomiota painoosi</p>';
else $huomautus='<p>Hups!</p>'; 
?>
<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf8">
            <title>Painoindeksin laskenta</title>
    </head>
    <body>
        <p><a href="lomake.html">Takaisin</a></p>
        <h3>Terve <?php echo $nimi?>!</h3>
        <?php
        echo "<p>Pituutesi $pituus cm ja painosi $paino kg perusteella laskettu painoindeksi ";
        echo "on $bmi</p>";
        echo $huomautus;
        ?>
    </body>
</html>