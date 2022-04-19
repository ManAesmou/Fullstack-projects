<?php
/*
	Tulostaa kryptatun tekstin
*/
$teksti='salasana';
//include('dbConnect.php');
$tekstiKryptattu=password_hash($teksti,PASSWORD_DEFAULT);
echo $tekstiKryptattu;
?>