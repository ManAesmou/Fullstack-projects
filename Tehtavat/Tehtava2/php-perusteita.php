<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .virhe {
      display: inline-block;
      color: #FF0000;
    }
  </style>
  <title>PHP perusteita</title>
</head>
<body>

<?php 
  echo "<h1>Tehtävä 1, Perjantai 8.4. - PHP perusteita</h1>";

  echo '1. Tee PHP-scripti, jossa määritellään muuttuja $a ja $b. <br>
  Anna $a-muuttujan arvoksi 5 ja $b-muuttujan arvoksi 3. <br>
  Laske ja tulosta PHP:lla vastaukset kaikille peruslaskutoimitusoperaatioille: + - / * % <br><br>';

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
?>

<br><br>

<?php
  echo '2. Tee PHP-scripti, jossa alussa määritellään muuttuja $luku. <br> 
  Anna muuttujalle arvoksi 6. Tulosta silmukan avulla muuttujan $luku kertotaulu 1-10. <br><br>';

  $luku = 6;
  
  echo "Vastaus: <br>";
  for($i = 1; $i < 11; $i++){
    $tulo = $i * $luku;
    echo "$i * $luku = $tulo <br>";
  }
?>

<br><br>

<?php 
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
?>

<br><br>

<p> 
  4. Tee sovellus, jossa muuttujina määritetään  henkilön $nimi, $pituus ja $paino. <br>
  Ohjelma laskee painoindeksin (kaava: $paino/($pituus*$pituus)*10000 ). <br>
  Lisäksi sovellus kertoo indeksin perusteella onko ihminen <br>
  normaalipainoinen (indeksi 20-25), lievästi ylipainoinen (indeksi 25-30) vai ylipainoinen. <br>
</p>
<p>Vastaus:</p>

<?php 
  if(!empty($_GET['virhe'])) $virhe = true; else $virhe = false; 
  if(!empty($_GET['virhe'])) $pituus = $_GET['pituus']; else $pituus = ''; 
  if(!empty($_GET['virhe'])) $paino = $_GET['paino']; else $paino = ''; 
?>

<form action="./bmi.php" method="GET">
  <input type="text" placeholder="Nimi" name="nimi" maxlength="20" required>
    <span class="virhe">
      <?php if($virhe) echo '<p>Tarkista kentän tiedot!</p>' ?> 
    </span><br>
  <input type="number" placeholder="Pituus (cm)" name="pituus" value="<?php if($virhe) echo $pituus ?>" required><br>
  <input type="number" placeholder="Paino (kg)" name="paino" value="<?php if($virhe) echo $paino ?>" required><br>
  <input type="submit" value="Laske painoindeksi">
</form>

<br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>
</html>