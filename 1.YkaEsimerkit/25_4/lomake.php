<?php
/**
 *  file:   lomake.php
 *  desc:   Tiedostojen talletukseen liittyvä esimerkki, lomakesivu
 */
if(isset($_GET['viesti'])) $viesti=$_GET['viesti']; else $viesti='';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php echo '<p class="alert alert-info">'.$viesti.'</p>'?>
<div class="container">
  <h1>Tiedoston talletuksesta</h1>
  <p>Alla pari lomaketta, joilla voi tallentaa tiedostoja palvelimelle.</p>
  <div class="container">
  <form action="talletaTiedosto.php" method="post" enctype="multipart/form-data">
      <p>Valitse tiedosto ladattavaksi palvelimelle:</p>
      <input type="file" name="tiedosto"><input type="submit" value="Talleta">
  </form>
  </div>
  <p><hr></p>
  <div class="container">
  <form action="talletaPDFTiedosto.php" method="post" enctype="multipart/form-data">
      <p>Valitse PDF-tiedosto ladattavaksi palvelimelle:</p>
      <input type="file" name="tiedosto"><input type="submit" value="Talleta">
  </form>
  </div>
  <p><hr></p>
  <div class="container">
  <form action="talletaPieniTiedosto.php" method="post" enctype="multipart/form-data">
      <p>Valitse ladattavaksi palvelimelle alle 50000 tavua (bytes) oleva tiedosto:</p>
      <input type="file" name="tiedosto"><input type="submit" value="Talleta">
  </form>
  </div>
  <p><hr></p>
  <div class="container">
  <form action="talletaKuvaTiedosto.php" method="post" enctype="multipart/form-data">
      <p>Valitse kuvatiedosto ladattavaksi palvelimelle:</p>
      <input type="file" name="tiedosto"><input type="submit" value="Talleta">
  </form>
  </div>
</div>

</body>
</html>