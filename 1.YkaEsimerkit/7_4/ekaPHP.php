<?php
//Katsotaan palvelin- ja PHP-ympäristön tiedot phpinfo()-funktiolla
phpinfo();
/*
    phpinfoa voi käyttää, kun vertaa oman kehitysympäristön ja
    tuotantopalvelinympäristön ominaisuuksia.
*/
$selain=$_SERVER['HTTP_USER_AGENT'];
echo $selain;
?>