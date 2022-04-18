<?php
/*
    file:   lopeta.php
    desc:   Hävittää kaikki sovelluksen tilatiedot eli cookiet ja mahdolliset session-tiedot
*/
setcookie('nimi','',-60); //vanhenemisaika negatiivinen -> selain hävittää cookien
setcookie('email','',-60);
setcookie('laskuri','',-60);

//session-tiedot myös
session_start(); //käynnistää tai ottaa käyttöön olemassa olevan session 
session_destroy(); //hävitetään nykyinen sessio

//ohjataan alkuun
header('location: aloita.php');
?>