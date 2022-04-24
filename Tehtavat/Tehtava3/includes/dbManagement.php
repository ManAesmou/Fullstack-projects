<?php
require 'dbConnect.php';

isset($_GET['page']) ? $page = $_GET['page'] : $page = '';

if ($page == 'all_presidents') {
  $sql = 'SELECT first_name, last_name, birth FROM presidentti ORDER BY first_name, last_name';
  $result = $conn->query($sql);
  $rowCount = mysqli_num_rows($result);

} else if ($page == 'search_president') {    
  !empty($_GET['hakusana']) ? $searchWord = $_GET['hakusana'] : $searchWord='';

  $sql = "SELECT first_name, last_name, birth FROM presidentti 
          WHERE first_name like '%%$searchWord%%'
          OR last_name like '%%$searchWord%%'
          OR birth like '%%$searchWord%%'
          ORDER by first_name, last_name, birth";

  $result = $conn->query($sql);
  $rowCount = mysqli_num_rows($result);

} else if ($page == 'data' || $page == 'change') {
  !empty($_GET['first_name']) ? $firstName = $_GET['first_name'] : $firstName='';
  !empty($_GET['last_name']) ? $lastName = $_GET['last_name'] : $lastName='';

  $sql = "SELECT * 
          FROM presidentti 
          WHERE first_name = '$firstName'
          OR last_name = '$lastName'";

  $result = $conn->query($sql);

  if($result->num_rows > 0)
    $row = $result->fetch_assoc();

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

  //tarkistetaan, että presidenttiä ei ole ennestään tietokannassa
  $sql = "SELECT first_name, last_name 
        FROM presidentti 
        WHERE first_name = '$firstName' 
        AND last_name = '$lastName'";
  $result = $conn->query($sql);
  $rowCount = mysqli_num_rows($result);
  if ($rowCount > 0) {
      header('location: ../index.php?page=add_president&error=president_already_exists');
  } else {
      //muodostetaan sql-lause ja suoritetaan se
      $sql = "INSERT INTO presidentti(last_name, first_name, suffix, city, state, birth, death)
        VALUES ('$lastName','$firstName',$suffix,'$city','$state','$birth',$death)";
    
      if ($conn->query($sql) === true) {
          //lisäys onnistui
          header('location: ../index.php?page=all_presidents&president_added_to_database');
      } else {
          header('location: ../index.php?page=all_presidents&error=sql_insert-statement');
      }
  }
  
} else if(isset($_POST['lahetaMuokkaus'])) {
   //luetaan lomakkeen kentät ja päivitetään tiedot
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
 
   //sql-lause
   $sql = "UPDATE presidentti 
           SET first_name = '$firstName', 
               last_name = '$lastName', 
               suffix = $suffix, 
               city = '$city', 
               state = '$state',
               birth = '$birth', 
               death = $lastName WHERE presidentID = $presidentId";
   //suoritetaan päivitys
   if ($conn->query($sql) === TRUE){
       //päivitys onnistui
       header('location: ../index.php?page=data&first_name="'.$firstName.'"&changes_saved');
   }else {
       header('location: ../index.php?page=data?error=president_update');
   }
}
?>