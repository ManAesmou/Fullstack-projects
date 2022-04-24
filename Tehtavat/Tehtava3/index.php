<?php
require_once 'includes/header.php';

isset($_GET['page']) ? $page = $_GET['page'] : $page = '';

if ($page == 'all_presidents') include('kaikkiPresidentit.php');
else if ($page == 'search_president') include('presidenttiHaku.php'); 
else if ($page == 'data') include('omatTiedot.php');
else if ($page == 'add_president') include('lisaaPresidentti.php');
else if ($page == 'change') include('muokkaaPresidentti.php');

require_once 'includes/footer.php';
?>