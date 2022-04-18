<?php
/*
    file:   esimerkkiKolme.php
    desc:   Lyhyt esimerkki PHP-koodin esittämistavasta
    auth:   Yrjö K
    date:   7.4.2022
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Esimerkki PHP-koodista</title>
    </head>
    <body>
    <h3>Esimerkki kolme</h3>
    <?php
    //For-lauseella tulostusta
    for($i=1;$i<7;$i++){
        echo "<h$i>Otsikko kokoa h$i</h$i>";
    }
    ?>
    <h4>Tässä välissä html-otsikko</h4>
    <?php
    //For-lauseella tulostusta
    for($i=6;$i>0;$i--){
        echo "<h$i>Otsikko kokoa h$i</h$i>";
    }
    ?>
    <p>Lopuksi muuttujan $i arvoksi jäi <?php echo $i?></p>
    </body>
</html>