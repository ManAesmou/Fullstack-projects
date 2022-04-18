<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tulokset</title>
</head>
<body>

<p><a href="./lopeta.php">Takaisin</a></p>  

<?php
$tulos = '';

if(empty($_GET)) {
    header('location: php-perusteita-osa-2.php');
} else {
    $error = false;

    if(empty($_GET['luku1'])) $error = true; else $a = $_GET['luku1'];
    if(empty($_GET['operaattori'])) $error = true; else $operaattori = $_GET['operaattori'];
    if(empty($_GET['luku2'])) $error = true; else $b = $_GET['luku2'];

    if ($error) {
        header('location: php-perusteita-osa-2.php?empty_fields');
    } else {

        setcookie('luku1', $a, time()+30*24*60*60);
        setcookie('operaattori', $operaattori, time()+30*24*60*60);
        setcookie('luku2', $b, time()+30*24*60*60);

        session_start(); 
        $_SESSION['alkuaika'] = date('H:i:s', time());
    }
}

switch($operaattori){
    case "1":
        $tulos = $a + $b;
        break;
    case "2":
        $tulos = $a - $b;
        break;
    case "3":
      $tulos = $a * $b;
      break;
    case "4":
      $tulos = $a / $b;
      break;
    case "5":
      $tulos = $a % $b;
      break;
    default:
          header('Location: php-perusteita-osa-2.php?choose_operator');
}

echo '<h2>Tulos: ' . number_format($tulos, 0, ",", " ") . '</h2>';
echo '<p>Aloitit toiminnon klo: ' . $_SESSION['alkuaika'] . '.</p>';


$luku = 6;
  
  echo "Vastaus: <br>";
  for($i = 1; $i < 11; $i++){
    $tulo = $i * $luku;
    echo "$i * $luku = $tulo <br>";
  }









  echo '3. Tee PHP-scripti, jossa määritellään muuttujat: $nimi ja $ika. <br>
  Anna arvoiksi "Pekka" ja 50. Tulosta $nimi ja $ika sekä ehtolauseen avulla: <br>
  - Alaikäinen, jos $ika on alle 18 <br>
  - Työikäinen, jos $ika on alle 65 <br>
  - Eläkeläinen muuten<br><br>';

  $nimi = "Pekka";
  $ika = 50;

  echo "Vastaus: <br>";
  if ($ika < 18) {
    echo "$nimi on $ika-vuotias, eli hän on alaikäinen.";
  } elseif ($ika < 65) {
    echo "$nimi on $ika-vuotias, eli hän on työikäinen.";
  } else {
    echo "$nimi on $ika-vuotias, eli hän on eläkeläinen";
  }











  //Alustetaan muuttujat, tarkistetaan välit ja erikoismerkit.
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $nimi = test_input($_GET['nimi']);
  $pituus = test_input($_GET['pituus']);
  $paino = test_input($_GET['paino']);
  $error = false;

  //Tarkistetaan tyhjätkentät ja merkit.
  // if (empty($nimi) || empty($pituus) || empty($paino)) {
  //   header("location: php-perusteita-osa-2.php?error=tyhjiä_kenttiä");
  //   exit();
  // } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $nimi)) {
  //   header("Location: php-perusteita-osa-2.php?error=vain_kirjaimet_ja_välilyönnit_sallitaan_nimessä&pituus=$pituus&paino=$paino");
  //   exit();
  // } else {

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
?>
</body>
</html>

