<!DOCTYPE html>
<html>
    <head>
        <title>Esimerkki PHP-koodista</title>
    </head>
    <body>
    <h3>Esimerkkiä PHP-koodista</h3>
    <?php 
     echo "<p>Tämä teksti on tulostettu PHP:llä</p>";
     echo '<p>Tämä on myös PHP:n tulostamaa</p>';
     //Määritellään muuttuja ja tulostetaan se merkkijonon sisällä
     $nimi='Jaska Jokunen'; //tyyppiä ei tarvitse määrittää
     $ika=23;
     echo "<h3>Terve $nimi!</h3>";
     echo "<p>Sinä $nimi olet $ika-vuotias</p>";
     echo '<p>Edellsessä tulostettiin $nimi ja $ika -muuttujien sisällöt</p>';
     //echo ja print ovat funktioita, joilla PHP "tulostaa" sisältöä
     print "<h3>Print ja Echo -funktiot</h3>";
     print "<p>Osaako $nimi ohjelmointia?</p>";
    ?>
    </body>
</html>
