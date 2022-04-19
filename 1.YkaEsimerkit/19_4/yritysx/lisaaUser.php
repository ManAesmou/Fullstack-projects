<?php
/**
 *  file:   lisaaUser.php
 *  desc:   Tallentaa uuden rivin tauluun users.
 */
if(empty($_POST)) header('location: index.php?sivu=users');
else{
    include('dbConnect.php');
    $etunimi=$conn->real_escape_string($_POST['etunimi']);
    $sukunimi=$conn->real_escape_string($_POST['sukunimi']);
    $email=$conn->real_escape_string($_POST['email']);
    $rooli=$conn->real_escape_string($_POST['rooli']);
    //muodostetaan salasana -> tässä käytetään vain 'salasana' tekstiä, voisi olla generoitu
    $salasana='salasana';
    $salasana=password_hash($salasana,PASSWORD_DEFAULT);
    //tarkistetaan, että email ei ole ennestään tietokannassa
    $sql="SELECT Email FROM users WHERE Email='$email'";
    $tulos=$conn->query($sql);
    if($tulos->num_rows > 0) header('location: index.php?sivu=users&virhe=emailExists');
    else{
     //email ei ollut ennestään eli voidaan lisätä
     //muodostetaan sql-lause ja suoritetaan se
     $sql="INSERT INTO users(Email, Password, Sukunimi, Etunimi, userRole)
            values('$email','$salasana','$sukunimi','$etunimi','$rooli')";
      if($conn->query($sql)===TRUE){
         //lisäys onnistui
         header('location: index.php?sivu=users');
      }else header('location: index.php?sivu=users&virhe=true');
    }

}
?>