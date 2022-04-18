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

$a = 5;
$b = 3;

$yhteen = $a + $b;
$erotus = $a - $b;
$kerto = $a * $b;
$jako = $a / $b;
$jakojaannos = $a % $b;

echo "Vastaus: <br>";
echo "Lukujen $a ja $b yhteenlaskun tulos on $yhteen. <br>";
echo "Lukujen $a ja $b vähennyslaskun tulos on $erotus. <br>";
echo "Lukujen $a ja $b kertolaskun tulos on $kerto. <br>";
echo "Lukujen $a ja $b jakolaskun tulos on " .number_format($jako, 2, ","). ". <br>";
echo "Lukujen $a ja $b jakojäännöslaskun tulos on $jakojaannos. <br>";




  //Alustetaan muuttujat, tarkistetaan välit ja erikoismerkit.
  $nimi = test_input($_GET['nimi']);
  $pituus = test_input($_GET['pituus']);
  $paino = test_input($_GET['paino']);
  $virhe = false;

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

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

