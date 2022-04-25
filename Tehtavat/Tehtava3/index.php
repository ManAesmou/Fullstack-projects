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
else $page == '';

//Lisätään alatunniste sivulle.
require_once 'includes/footer.php';
?>