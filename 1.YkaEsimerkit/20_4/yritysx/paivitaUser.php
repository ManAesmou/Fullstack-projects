<?php
/**
 *  file:   paivitaUser.php
 *  desc:   Päivitetään käyttäjän tietoja userID:n perusteella
 */
if(empty($_POST)) header('location: index.php?sivu=kirjaudu');
else{
    include('dbConnect.php');
    //luetaan lomakkeen kentät ja päivitetään tiedot
    $userID=$conn->real_escape_string($_POST['userID']);
    $etunimi=$conn->real_escape_string($_POST['etunimi']);
    $sukunimi=$conn->real_escape_string($_POST['sukunimi']);
    $puhelin=$conn->real_escape_string($_POST['puhelin']);
    $rooli=$conn->real_escape_string($_POST['rooli']);
    //sql-lause
    $sql="UPDATE users SET Etunimi='$etunimi', Sukunimi='$sukunimi'";
    if(!empty($puhelin)) $sql.=" ,Puhelin='$puhelin'";
    $sql.=", userRole='$rooli' WHERE userID=$userID";
    //suoritetaan päivitys
    if($conn->query($sql)===TRUE){
        //päivitys onnistui
        header('location: index.php?sivu=users');
    }else header('location: index.php?sivu=users?virhe=userUpdate');
}
?>