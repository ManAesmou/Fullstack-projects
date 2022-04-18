<?php
/*
    file:   muuttujia.php
    desc:   Esimerkkerjä PHP-muuttujista
*/
//merkkijonomuuttujia
$nimi='Pekka';
$sukunimi='Pekkanen';
$kokonimi="$nimi $sukunimi";
$nimesi=$nimi.' '.$sukunimi;
//numeroita
$a=5;
$b=6.3;
$tulo=$a * $b;
$Tulo=number_format($tulo,2,',');
$jako=$a/$b;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Esimerkki PHP-koodista</title>
    </head>
    <body>
    <h3>Merkkijonoja tulostettuna</h3>
    <?php
        echo "<p>Terve $nimi $sukunimi!</p>";
        echo "<p>Terve $kokonimi</p>";
        echo "<p>Terve $nimesi</p>";
    ?>
    <h3>Numeroita tulostettuna</h3>
    <?php
        echo "<p>Lukujen $a ja $b tulo on $tulo</p>";
        echo "<p>$a x $b = $Tulo</p>";
        echo "<p>$a / $b = $jako</p>";
        echo "<p>$a / $b =".number_format($jako,2,',').'</p>';
    ?>
    <h3>Muita muuttujaesimerkkejä</h3>
    <?php
        $hinta='50€'; //tyyppinä teksti
        $kpl=3;
        $yht=$hinta * $kpl; //tästä rivistä tulee "Warning", koska tekstimuuttuja
        echo "<p>Hinta $hinta ja kpl $kpl, yhteensä=$yht</p>";
        if($hinta>30) echo '<p>Onpa kallista</p>';
        if($hinta==50) echo '<p>Yhtäsuuri</p>'; //tämä ei ole tosi
        if($hinta==='50€') echo '<p>Tosi</p>';
        if($hinta!==50) echo '<p>Yhtäsuuri, eri tyyppi</p>';
        $hinta=20; //muuttujan arvo ja myös tyyppi vaihtui kokonaisluvuksi
        echo "<p>$hinta".'€'." x $kpl = ".$hinta*$kpl.'€',"</p>";
    ?>
    <h3>Taulukot</h3>
    <?php
        //taulukkomuuttujassa on useita arvoja, joita voidaan käyttää
        $lista[]='Kissa'; //sijoittaa ensimmäiseen vapaaseen paikkaan
        $lista[]='Koira'; //sijoittaa ensimmäiseen vapaaseen paikkaan
        echo '<p>Muuttujan $lista ensimmäinen arvo on: '.$lista[0].'</p>';
        echo '<p>Muuttujan $lista toinen arvo on: '.$lista[1].'</p>';
        $lista[2]='Hevonen';
        echo '<p>Muuttujan $lista kolmas arvo on: '.$lista[2].'</p>';
        $elaimet=array('Kissa','Koira','Hevonen');
        echo '<p>Muuttujan $elaimet kolmas arvo on: '.$elaimet[2].'</p>';
        $suurilista[0][0]='Eka';
        $suurilista[0][1]='Toka';
        $suurilista[1][0]='Kolmas';
        echo '<p>Kaksiulotteisesta riviltä yksi, toinen arvo: '.$suurilista[0][1].'</p>';
    ?>
    </body>
</html>