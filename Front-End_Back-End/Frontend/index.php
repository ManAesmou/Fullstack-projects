<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="author" content="Ismo Manninen">
    <meta name="keywords" content="Ismo Manninen">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/416b989c77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Luodaan muistipeli runko, jossa näkyy nimi, tekijä ja 20 korttia. 
        Lisäksi painike uudelleenkäynnistykselle, kulunut aika ja arvausten lukumäärä.
        nimetään tunnisteet el-päätteellä.
    
        Bootstrapilla tyylitelty HTML-elementti sisältää sinisen rungon, jossa on musta ylä- ja alatunniste, 
        jotka on asetettu marginaaliin ja täytettä 2-5 väliltä. Lisäksi tekstit on keskitetty ja valkoinen. 
        Säiliössä on yksi muotoiltu div-elementti.-->

    <title>Arvioitava tehtävä</title>
  </head>

  <body class="bg-info">
    <header>
      <div class="header mb-2 p-4 bg-dark text-white text-center">
        <h1>Muistipeli</h1>
        <a class="text-white text-decoration-none" href="/Curriculumvitae/Backend/index.php?page=home">Takaisin</a>
      </div>
    </header>
    
    <main>
      <div class="container">
        <div class="row">
          <div id="box-el">
            <span id="box-btn-el">
              
              <span class="item" id="item-el">
                Aikaa kulunut
                <span id="time-el">0</span> sekuntia,
              </span>
              
              <span class="item" id="item-el-2">
                <span id="guesses-el">0</span>
                arvausta
                <span id="seconds-el"></span>
              </span>
              
              <span class="btn bg-primary" id="reload-el" onclick="nollaaPelilauta();" data-bs-toggle="tooltip" title="kaksoisnapsautus päivittää välilehden">
                Aloita uudelleen
              </span>

            </span>
            <div id="table-el"></div>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <div class="footer mt-5 p-4 bg-dark text-white text-center">
        <p class="m-2">Ismo Manninen</p>
        <p class="m-2">TA42T21K</p>
      </div>
    </footer>

    <!-- Bootstrap Bundle with Popper and JavaScript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>