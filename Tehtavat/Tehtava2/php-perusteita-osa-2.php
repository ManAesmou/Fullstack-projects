<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="author" content="Ismo Manninen">
  <meta name="keywords" content="Ismo Manninen">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/416b989c77.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
  <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
  <link rel="stylesheet" href="css/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .virhe {
      display: inline-block;
      color: #FF0000;
    }
  </style>
  <title>PHP perusteita osa 2</title>
</head>
<body>

<h1 class="m-3">Tehtävä 2, tiistai 18.4. - PHP perusteita osa 2</h1>

<div class="container-fluid">
  <p class="m-4 border border-2 border-info col-7 p-2">Muuta (tehtävän 1) kolme ensimmäistä sovellusta sellaisiksi, että ne käyttävät lomaketta. <br>
                  Ensin on lomake, jonne syötetään tiedot (luku, luvut tai nimi ja ikä) ja <br> 
                  sitten annetuilla tiedoilla näytetään vastaukset.</p>
  <p class="m-2">1. Tee PHP-scripti, jossa määritellään muuttuja $a ja $b. <br>
      Anna $a-muuttujan arvoksi 5 ja $b-muuttujan arvoksi 3. <br>
      Laske ja tulosta PHP:lla vastaukset kaikille peruslaskutoimitusoperaatioille: + - / * %.
  </p>
    <div class="row">
      <form action="./istuntoJaEvasteet.php" method="GET">
        <div class="col-2">
          <input type="number" class="form-control m-2 col-1" name="luku1" placeholder="Syötä Luku">
        </div>
        <div class="col-1">
          <select class="form-select m-2" name="operaattori">
            <option value = "1">+</option>
            <option value = "2">-</option>
            <option value = "3">*</option>
            <option value = "4">/</option>
            <option value = "5">%</option>
          </select>
        </div>
        <div class="col-2">
          <input type="number" class="form-control m-2" name="luku2" placeholder="Syötä toinen luku">
        </div>
        <button type="submit" class="btn btn-primary m-2" name="lahetaLasku">Laske</button>
      </form>
    </div>
</div>

<br><br>

<div class="container-fluid">
  <p class="m-3">2. Tee PHP-scripti, jossa alussa määritellään muuttuja $luku. <br> 
  Anna muuttujalle arvoksi 6. Tulosta silmukan avulla muuttujan $luku kertotaulu 1-10.
  </p>

    <div class="row">
      <form action="./istuntoJaEvasteet.php" method="GET">
        <div class="col-2">
          <input type="number" class="form-control m-2 col-1" name="lukuKertotaulu" placeholder="Syötä Luku">
        </div>
        <button type="submit" class="btn btn-primary m-2" name="lahetaKertotaulu">Laske kertotaulu</button>
      </form>
    </div>
</div>
<?php

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

<form action="./istuntoJaEvasteet.php" method="GET">
  <input type="text" placeholder="Nimi" name="nimi" maxlength="20">
    <span class="virhe">
      <?php if($virhe) echo '<p>Tarkista kentän tiedot!</p>' ?> 
    </span><br>
  <input type="number" placeholder="Pituus (cm)" name="pituus" value="<?php if($virhe) echo $pituus ?>"><br>
  <input type="number" placeholder="Paino (kg)" name="paino" value="<?php if($virhe) echo $paino ?>"><br>
  <input type="submit" value="Laske painoindeksi">
</form>

<br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>
</html>