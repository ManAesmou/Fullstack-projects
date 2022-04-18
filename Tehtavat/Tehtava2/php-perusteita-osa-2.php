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
    .error-red {
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
      <form action="./istunto-ja-evasteet.php" method="POST">
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
        <button type="submit" class="btn btn-primary m-2">Laske</button>
      </form>
    </div>
</div>

<br><br>

<div class="container-fluid">
  <p class="m-3">2. Tee PHP-scripti, jossa alussa määritellään muuttuja $luku. <br> 
                  Anna muuttujalle arvoksi 6. Tulosta silmukan avulla muuttujan $luku kertotaulu 1-10.
  </p>

    <div class="row">
      <form action="./istunto-ja-evasteet.php" method="POST">
        <div class="col-2">
          <input type="number" class="form-control m-2 col-1" name="lukuKertotaulu" placeholder="Syötä Luku">
        </div>
        <button type="submit" class="btn btn-primary m-2">Laske kertotaulu</button>
      </form>
    </div>
</div>

<br><br>

<div class="container-fluid">
  <p class="m-3">3. Tee PHP-scripti, jossa määritellään muuttujat: $nimi ja $ika. <br>
                  Anna arvoiksi "Pekka" ja 50. Tulosta $nimi ja $ika sekä ehtolauseen avulla: <br>
                  - Alaikäinen, jos $ika on alle 18 <br>
                  - Työikäinen, jos $ika on alle 65 <br>
                  - Eläkeläinen muuten.
  </p>
    <div class="row">
      <form action="./istunto-ja-evasteet.php" method="POST">
        <div class="col-3 px-4">
          <?php if(!empty($_GET['error'])) $error = true; else $error = false; ?>
          <span class="error-red">
            <?php if($error) echo 'Please check the field textform!' ?> 
          </span><br> 
        </div>
        <div class="col-3">
          <input type="text" class="form-control m-2" name="nimi" placeholder="Syötä nimi">
          <input type="number" class="form-control m-2" name="ika" placeholder="Syötä ikäsi">
        </div>
        <button type="submit" class="btn btn-primary m-2">Tarkista luokka</button>
      </form>
    </div>
</div>    

<br><br><br><br><br><br>

</body>
</html>