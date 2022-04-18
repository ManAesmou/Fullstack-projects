<?php
/**
 *  file:   rakenteista.php
 *  desc:   Esimerkkejä toisto ja valintarakenteista 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Esimerkki PHP-rakenteista</title>
    </head>
    <body>
    <h3>Toistorakenne For-loopilla</h3>
    <?php
    //kun tiedetään ennen toistoa montako kertaa toiston tulee tapahtua
    $lista=array('Kissa','Koira','Hevonen','Vuohi');
    $montako=count($lista); //laskee montako arvoa listalla on
    for($indeksi=0;$indeksi<$montako;$indeksi++) 
    {
        //tulostetaan arvot
        echo "<p>Listan $indeksi. arvo on: ".$lista[$indeksi].'</p>';
    }
    ?>
    <h3>Toistorakenne While-loopilla</h3>
    <?php
    //Kun ei ennen toiston aloitusta tiedetä toistojen lopullista määrää
    $indeksi=0; //lähdetään alusta liikkeelle
    while($indeksi<$montako)
    {
        //tulostetaan arvot
        echo "<p>Listan $indeksi. arvo on: ".$lista[$indeksi].'</p>';
        $indeksi++; //ehdossa olevan indeksin on muututtava toistossa, jotta toisto loppuu joskus!
    }
    ?>
    <h3>Toistorakenne Foreach -loopilla</h3>
    <?php
        //listojen (array) tulostus helposti foreach-loopilla
        echo "<p>Listan eläimet:<br>";
        foreach($lista as $elain)
        {
            echo $elain.'<br>';
        }
        echo '</p>';
    ?>
    <h3>Valintarakenne if-elseif-else</h3>
    <?php
        //ehtorakenne, jossa ehto sekä tosi/epätosi vaihtoehtojen toiminnot
        $a=1;
        $b=0;
        if($a>$b)
        {
            //tämä osa toteutuu, jos ehto on tosi
            echo "<p>$a on suurempi kuin $b</p>";
        }else
        {
            //tämä osa toteutuu, jos ehto on epätosi
            echo "<p>$a ei ole suurempi kuin $b</p>";
        }
        if($a==$b)
        {
            //yhtäsuuria
            echo '<p>Yhtäsuuria</p>';
        }
        elseif($a<$b)
        {
            //a pienempi
            echo '<p>$a pienempi</p>';
        }
        else
        {
            //a on suurempi
            echo '<p>$a suurempi</p>';
        }
        //sama logiikka, ilman lauselohkoja (koska vain yksi lause kussakin ehto-osassa)
        if($a==$b) echo '<p>Yhtäsuuria</p>'; //yhtäsuuria
        elseif($a<$b) echo '<p>Pienempi</p>'; //a pienempi
        else echo '<p>Suurempi</p>'; //a suurempi
    ?>
    </body>
</html>