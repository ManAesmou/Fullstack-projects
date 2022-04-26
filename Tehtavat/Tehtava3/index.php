<?php
//Lisätään ylätunniste sivulle.
require_once 'includes/header.php';

//Tarkistetaan, onko assosiatiivinen joukko muuttuja perustettu, joka välitetään URL-parametrien kautta.
isset($_GET['page']) ? $page = $_GET['page'] : $page = '';

if (isset($_GET['error'])) {
  $error = $_GET['error'];

      echo '
  <div class="container">
      <div class="row d-flex justify-content-center mt-5">
          <div class="alert alert-danger d-flex align-items-center col-md-4" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="50" height="40" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
              <div>
                <h3>Error!</h3>';

                //Tarkistetaan muuttujan arvo ja tulostetaan siihen liittyvä vastaus.
                if ($error == 'president_already_exists') {
                  echo '<p>President already exists in the database.</p>';
                }  else if ($error == 'sql_insert-statement') {
                  echo'<p>The SQL insert-statement is invalid.</p>';
                } else if ($error == 'sql_update-statement') {
                  echo '<p>The SQL update-statement is invalid.</p>';
                } else if ($error == 'sql_delete-statement') {
                  echo '<p>The SQL delete-statement is invalid.</p>';
                }
          echo'</div>
          </div>
      </div>
  </div>';
} else if (isset($_GET['complete'])) {
  $complete = $_GET['complete'];

  echo '
  <div class="container">
      <div class="row d-flex justify-content-center mt-5">
          <div class="alert alert-success d-flex align-items-center col-md-4" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="50" height="40" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                <h3>Complete!</h3>';

                //Tarkistetaan muuttujan arvo ja tulostetaan siihen liittyvä vastaus.
                if ($complete == 'president_added_to_database') {
                echo '<p>The president was successfully added to the president\'s table in the database.</p>';
                }  else if ($complete == 'changes_saved') {
                  echo'<p>President\'s information updated.</p>';
                } else if ($complete == 'president_deleted') {
                  echo '<p>The president has been removed from the president\'s table in the database.</p>';
                } 
          echo'</div>
          </div>
      </div>
  </div>';
}

//Valitaan oikea sivusto näytettäväksi URL-parametrien arvojen perusteella.
if ($page == 'all_presidents') include('kaikkiPresidentit.php');
else if ($page == 'search_president') include('presidenttiHaku.php'); 
else if ($page == 'data') include('omatTiedot.php');
else if ($page == 'add_president') include('lisaaPresidentti.php');
else if ($page == 'change') include('muokkaaPresidentti.php');
else if ($page == 'delete') include('poistaPresidentti.php');
else {
  echo '
  <div class="container">
      <div class="row d-flex justify-content-center mt-5">
        <div class="alert alert-success col-11" role="alert">
          <h4 class="alert-heading">Tervetuloa!</h4>
            <p>Tältä sivustolta löydät Yhdysvaltojen presidentit 1700 luvun alkupuolelta alkaen.<br> 
            Voit lisätä, muokata ja poistaa presidenttejä haluamallasi tavalla. </p>
          <hr>
            <p class="mb-2">Sivusto on luotu palvelemaan tehtävän 3 tavoitteita: <br></p><p class="mx-3">
            "Käytä oheista presidentit-tietokantaskriptiä ja luo tietokanta sekä määritä käyttöoikeudet webbisovellusta varten. <br>
            1. Tee listaus USA presidenteistä aakkosjärjestyksessä (Etunimi, sukunimi ja syntymäaika). <br>
            2. Tee hakutoiminto (vrt Autosovellus), jolla voi hakea presidenttejä nimen tms perusteella. <br>
            3. Presidentin nimeä klikkaamalla näytetään ko presidentin kaikki tiedot (oma sivu). <br>
            4. Tee presidentin lisäyslomake + php-talletuskoodi. <br>
            5. Tee presidentin muokkauslomake + php-talletuskoodi. <br>
            6. Tee mahdollisuus poistaa tietoja (tietue kerrallaan).". </p>
        </div>
      </div>
  </div>';
}

//Lisätään alatunniste sivulle.
require_once 'includes/footer.php';
?>