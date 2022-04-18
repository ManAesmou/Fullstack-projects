<?php
/*
    file:   lopeta.php
    desc:   Hävittää kaikki sovelluksen tilatiedot eli cookiet ja mahdolliset session-tiedot
*/
setcookie('luku1','',-60); //vanhenemisaika negatiivinen -> selain hävittää cookien
setcookie('operaattori','',-60);
setcookie('luku2','',-60);
setcookie('lukuKertotaulu','',-60);
setcookie('nimi','',-60);
setcookie('ika','',-60);

//session-tiedot myös
session_start(); //käynnistää tai ottaa käyttöön olemassa olevan session 
session_destroy(); //hävitetään nykyinen sessio

//ohjataan alkuun
header('location: php-perusteita-osa-2.php');
?>