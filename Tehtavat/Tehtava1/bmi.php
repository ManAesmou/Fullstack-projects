<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painoindeksi</title>
</head>
<body>

<p><a href="./php-perusteita.php">Takaisin</a></p>
<h2>Tulos</h2>

<?php
  //Alustetaan muuttujat, tarkistetaan välit ja erikoismerkit. VIRHE TÄSSÄ JA ON JO PALAUTETTUNA (funktio-pyynnöt ennen funktiota)
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $nimi = test_input($_GET['nimi']);
  $pituus = test_input($_GET['pituus']);
  $paino = test_input($_GET['paino']);
  $virhe = false;

  //Tarkistetaan tyhjätkentät ja merkit.
  if (empty($nimi) || empty($pituus) || empty($paino)) {
    header("location: php-perusteita.php?virhe=tyhjiä_kenttiä");
    exit();
  } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $nimi)) {
    header("Location: php-perusteita.php?virhe=vain_kirjaimet_ja_välilyönnit_sallitaan_nimessä&pituus=$pituus&paino=$paino");
    exit();
  } else {

      //Tarkistetaan painoindeksi syötettyjen arvojen perusteella.
      $painoIndeksi = number_format($paino / ($pituus * $pituus) * 10000, 2, ",");

      if ($painoIndeksi < 20) {
          echo "Painoindeksi (BMI) on $painoIndeksi kg/m2 , joten $nimi on alipainoinen.";
      } elseif ($painoIndeksi < 25) {
          echo "Painoindeksi (BMI) on $painoIndeksi kg/m2 , joten $nimi on normaalipainoinen.";
      } elseif ($painoIndeksi < 30) {
          echo "Painoindeksi (BMI) on $painoIndeksi kg/m2, joten $nimi on lievästi ylipainoinen.";
      } else {
          echo "Painoindeksi (BMI) on $painoIndeksi kg/m2, joten $nimi on ylipainoinen.";
      }
  }
?>
</body>
</html>

