<?php
/*
    Tässä kaikki HTML-osuuskin tulee PHP:n tuottamana
*/
echo '<!DOCTYPE html><html><head><title>TOinen esimerkki PHP-koodista</title></head><body>';
//tähän pari muuttujaa
$a=5;
$b=6;
$summa=$a + $b;
echo "<h3>Yhteenlaskua</h3><p>Lukujen $a ja  $b summa on $summa</p>";
echo '</body></html>';
?>