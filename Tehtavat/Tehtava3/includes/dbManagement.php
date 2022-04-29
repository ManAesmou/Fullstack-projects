<?php
//Lisätään sivustolle käyttöön tietokantayhteys paikalliseen palvelimeen.
require 'dbConnect.php';

//Tarkistetaan, onko assosiatiivisia joukko muuttujia perustettu, jotka välitetään nykyiselle skriptille URL-parametrien kautta.
isset($_GET['page']) ? $page = $_GET['page'] : $page = '';
isset($_GET['first_name']) ? $firstName = $_GET['first_name'] : $firstName='';
isset($_GET['last_name']) ? $lastName = $_GET['last_name'] : $lastName='';
isset($_GET['presidentID']) ? $presidentId = $_GET['presidentID'] : $presidentId='';



//Haetaan presidentti-taulusta etunimi, sukunimi ja syntymäpäivämäärä.
if ($page == 'all_presidents') {
  $sql = 'SELECT first_name, last_name, birth FROM presidentti ORDER BY first_name, last_name';

//Suoritetaan kysely tietokannasta ja haetaan rivien määrä tietokannasta.
  $result = $conn->query($sql);
  $rowCount = mysqli_num_rows($result);



//Haetaan presidentti-taulusta etunimi, sukunimi ja syntymäpäivämäärä hakusanan perusteella. 
} else if ($page == 'search_president') {    
  !empty($_GET['hakusana']) ? $searchWord = $_GET['hakusana'] : $searchWord='';

  $sql = "SELECT first_name, last_name, birth FROM presidentti 
          WHERE first_name like '%%$searchWord%%'
          OR last_name like '%%$searchWord%%'
          OR birth like '%%$searchWord%%'
          ORDER by first_name, last_name, birth";

  //Suoritetaan kysely tietokannasta ja haetaan rivien määrä tietokannasta.
  $result = $conn->query($sql);
  $rowCount = mysqli_num_rows($result);



//Haetaan kaikki presidentti-taulun sarakkeet tietokannasta, ja tallennetaan tulosrivit $row-muuttujaan.
} else if ($page == 'data' || $page == 'change' || $page == 'delete') {

  $sql = "SELECT * 
          FROM presidentti 
          WHERE first_name = '$firstName'
          OR last_name = '$lastName'";

  $result = $conn->query($sql);

  if($result->num_rows > 0)
    $row = $result->fetch_assoc();



//Välitetään lomakkeen arvot skriptille POST-menetelmän avulla, ja poistetaan merkkijonoista erikoismerkit, että SQL-lauseke voidaan suorittaa.
} else if (isset($_POST['laheta'])) {
  $firstName = $conn->real_escape_string($_POST['etunimi']);
  $lastName = $conn->real_escape_string($_POST['sukunimi']);
  $suffix = $conn->real_escape_string($_POST['paate']);
  $city = $conn->real_escape_string($_POST['kaupunki']);
  $state = $conn->real_escape_string($_POST['osavaltio']);
  $birth = $conn->real_escape_string($_POST['syntymapvm']);
  $death = $conn->real_escape_string($_POST['kuolemapvm']);

  $suffix = empty($suffix) ? "NULL" : "'$suffix'";
  $death = empty($death) ? "NULL" : "'$death'";

  //Haetaan etu- ja sukunimi presidentti-taulusta, joilla tarkistetaan, että presidenttiä ei ole ennestään tietokannassa.
  $sql = "SELECT first_name, last_name 
        FROM presidentti 
        WHERE first_name = '$firstName' 
        AND last_name = '$lastName'";

  $result = $conn->query($sql);
  $rowCount = mysqli_num_rows($result);

  if ($rowCount > 0) {
      header('location: ../index.php?page=add_president&error=president_already_exists');
  } else {
      //Valitaan presidentti-taulun sarakkeotsikot ja asetetaan POST-menetelmän kautta välitetyt arvot presidentti-taululle luoden uusi presidentti.
      $sql = "INSERT INTO presidentti(last_name, first_name, suffix, city, state, birth, death)
        VALUES ('$lastName','$firstName',$suffix,'$city','$state','$birth',$death)";
    
      //Tarkistetaan SQL-lausekkeen toimivuus.
      if ($conn->query($sql) === true) {
          header('location: ../index.php?page=all_presidents&complete=president_added_to_database');
      } else {
          header('location: ../index.php?page=all_presidents&error=sql_insert-statement');
      }
  }
  


//Välitetään lomakkeen arvot skriptille POST-menetelmän avulla, ja poistetaan merkkijonoista erikoismerkit, että SQL-lauseke voidaan suorittaa.
} else if(isset($_POST['lahetaMuokkaus'])) {
  $presidentId = $conn->real_escape_string($_POST['presidenttiId']);
  $firstName = $conn->real_escape_string($_POST['etunimi']);
  $lastName = $conn->real_escape_string($_POST['sukunimi']);
  $suffix = $conn->real_escape_string($_POST['paate']);
  $city = $conn->real_escape_string($_POST['kaupunki']);
  $state = $conn->real_escape_string($_POST['osavaltio']);
  $birth = $conn->real_escape_string($_POST['syntymapvm']);
  $death = $conn->real_escape_string($_POST['kuolemapvm']);
  
  $suffix = empty($suffix) ? "NULL" : "'$suffix'";
  $death = empty($death) ? "NULL" : "'$death'";

  //Valitaan presidentti-taulun sarakkeotsikot ja asetetaan POST-menetelmän kautta välitetyt arvot presidentti-taululle päivittäen presidentin tiedot.
  $sql = "UPDATE presidentti 
        SET first_name = '$firstName', 
            last_name = '$lastName', 
            suffix = $suffix, 
            city = '$city', 
            state = '$state',
            birth = '$birth', 
            death = $death WHERE presidentID = $presidentId";
  
  //Tarkistetaan SQL-lausekkeen toimivuus.
  if ($conn->query($sql) === true){
      header('location: ../index.php?page=data&first_name='.$firstName.'&complete=changes_saved');
  }else {
      header('location: ../index.php?page=data?error=sql_update-statement');
  }



//Poistetaan erikoismerkit presidenttiId-muuttujasta. Muuttujalla poistetaan presidentti-taulusta presidentti.
} else if (isset($_POST['poistaPresidentti'])) {
  $presidentId = $conn->real_escape_string($_POST['presidenttiId']);
  
  $sql = "DELETE FROM presidentti WHERE presidentID = $presidentId";
  
  //Tarkistetaan SQL-lausekkeen toimivuus.
  if($conn->query($sql) === true){
      header('location: ../index.php?page=all_presidents&complete=president_deleted');
  }else
      header('location: ../index.php?page=data?error=sql_delete-statement');
}
?>