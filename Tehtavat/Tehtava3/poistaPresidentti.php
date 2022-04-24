<?php
/**
 *  file:   poistaUser.php
 *  desc:   Poistaa urlin mukana tulevan userID:n perusteella käyttäjän tietokannasta
 */
session_start();
if(isset($_SESSION['userRole']) AND $_SESSION['userRole']=='admin'){
    //poistaminen sallittu vain kirjautuneelle admin-käyttäjälle
    include('dbConnect.php');
    $sql="DELETE FROM users WHERE userID=".$_GET['userID'];
    if($conn->query($sql)===TRUE){
        //poisto onnistui
        header('location: index.php?sivu=users');
    }else header('location: index.php?sivu=users?virhe=poistaUser');
 }else header('location: index.php?sivu=kirjaudu');
?>