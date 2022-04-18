<?php
/**
 *  file:   index.php
 *  desc:   Sovelluksen pääsivu. Tämän sivun kautta näytetään sisältöä esim kirjautuneelle käyttäjälle
 */
if(isset($_GET['sivu'])) $sivu=$_GET['sivu']; else $sivu='';
session_start(); //session avulla hallitaan tilaa - > onko kirjautunut vai ei
header('Cache-control: no-cache, no-store, must-revalidate');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>YritysX - Etusivu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($sivu=='') echo 'active'?>" href="index.php">Etusivu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($sivu=='tietoa') echo 'active'?>" href="index.php?sivu=tietoa">Tietoa yrityksestä</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($sivu=='kirjaudu') echo 'active'?>" 
          <?php
            if(isset($_SESSION['user'])) echo 'href="logout.php">Kirjaudu ulos</a>';
            else echo 'href="index.php?sivu=kirjaudu">Kirjaudu</a>';
          ?>
        </li>
      </ul>
    </div>
  </div>
</nav>  
<!--Tässä osa, jossa sivun sisältö näytetään -->
<?php
    //näytetään kirjautumistiedot, jos on kirjauduttu
    if(isset($_SESSION['user'])){
         echo '<p class="alert alert-info"><b>Käyttäjä: ';
         echo '<a href="index.php?sivu=omatTiedot">'; //linkki omien tietojen muokkaamiseen
         echo $_SESSION['user'];
         echo '</a></b></p>';
    }
    //sivun sisällön valinta
    if($sivu=='tietoa') include('tietoa.php');
    else if($sivu=='kirjaudu') include('kirjaudu.php');
    else if($sivu=='omatTiedot') include('omatTiedot.php');
    else echo '<div class="jumbotron"><h1>Tervetuloa - Tämä on YritysX</h1><p>Vaatii kirjautumisen</p></div>';

?>
</div>

</body>
</html>