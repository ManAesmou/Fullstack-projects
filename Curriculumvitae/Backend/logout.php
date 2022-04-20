<?php
//setcookie('nimi','',-60); //vanhenemisaika negatiivinen -> selain hävittää cookien
//setcookie('email','',-60);
//setcookie('laskuri','',-60);

//session-tiedot myös
session_start();
session_unset();  
session_destroy(); 

header('location: /Curriculumvitae/backend/login.php');
?>