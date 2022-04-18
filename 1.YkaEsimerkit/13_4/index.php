<?php
/*
    file:   index.php
    desc:   Autosovelluksen oletussivu
*/
if(!empty($_GET['sivu'])) $sivu=$_GET['sivu'];else $sivu='etusivu';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Autosovellusesimerkki</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<!-- Navigaatio -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if($sivu=='etusivu') echo 'active'?>" href="index.php?sivu=etusivu">Etusivu</a>
      </li>
     <li class="nav-item">
        <a class="nav-link <?php if($sivu=='kaikki') echo 'active'?>" href="index.php?sivu=kaikki">Kaikki autot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($sivu=='haku') echo 'active'?>" href="index.php?sivu=haku">Haku</a>
      </li>
    </ul>
  </div>
</nav>
<h1>Autosovellus</h1>
<?php
    if($sivu=='etusivu'){
        echo '<h3>Esimerkkejä tietokantakyselyistä</h3>
            <p>Tässä muutamia esimerkkejä tietokantakyselyistä</p>';
    }
    if($sivu=='kaikki') include('kaikki.php');
    if($sivu=='haku') include('haku.php');

?>
  
</div>

</body>
</html>