<?php
setcookie('luku1','',-60);
setcookie('operaattori','',-60);
setcookie('luku2','',-60);
setcookie('lukuKertotaulu','',-60);
setcookie('nimi','',-60);
setcookie('ika','',-60);

session_start(); 
session_destroy(); 

header('location: php-perusteita-osa-2.php');
?>