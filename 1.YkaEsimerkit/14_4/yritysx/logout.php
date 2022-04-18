<?php
/**
 *  file:   logout.php
 *  desc:   Hävittää session tiedot eli kirjaa käyttäjän ulos sovelluksesta
 */
session_start();
session_destroy();
header('location: index.php');
?>