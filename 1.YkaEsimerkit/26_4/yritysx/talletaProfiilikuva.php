<?php
/**
 *  file:   talletaProfiilikuva.php
 *  desc:   Tallentaa valitun profiilikuvan kansioon images/profiilikuvat ja päivittää users-taulusta
 *          userID:n perusteella käyttäjän tietuerivin profiilikuva-kenttään tiedoston nimen
 */
if(isset($_POST['profiilikuva'])) $profiilikuva=$_POST['profiilikuva'];else $profiilikuva='';
$tiedosto=basename($_FILES['tiedosto']['name']); //FILES-listan "tiedosto" -kentältä profiilikuvatiedoston oikea nimi
$talletuspolku='images/profiilikuvat/';
$tiedostotyyppi=strtolower(pathinfo($tiedosto,PATHINFO_EXTENSION)); //poimii tiedostotyypin
//määritetään nimi tiedostolle
$tiedosto=time().'_'.$tiedosto;
clearstatcache();
$uploadOk=1;  //tätä arvoa käytetään checkImageFile.inc -tiedoston koodissa
include('checkImageFile.inc'); //tarkistusfunktio kuvalle
if($uploadOk==0){
    //kuvatiedosto oli vääränlainen
    header("location: index.php?sivu=omatTiedot&virhe=true&viesti=$viesti");
}else{
 //kuvatiedosto oli oikeanlainen
 session_start();

 if(move_uploaded_file($_FILES['tiedosto']['tmp_name'],$talletuspolku.$tiedosto)){
    //tiedosto tallentui kohteeseen, päivitetään tietokanta
    include('dbConnect.php');
    $sql="UPDATE users SET profiilikuva='$tiedosto' WHERE userID=".$_SESSION['userID'];
    if($conn->query($sql)===TRUE){
        //päivitys onnistui
        unlink($talletuspolku.$profiilikuva); //poistaa vanhan kuvatiedoston
        header("location: index.php?sivu=omatTiedot&virhe=false&viesti=$viesti");
    }else{
        //ei voinut päivittää tietokantaa, poistetaan kuvatiedosto
        unlink($talletuspolku.$tiedosto); //poistaa uuden kuvatiedoston, koska ei voitu päivittää tietokantaa
        header('location: index.php?sivu=omatTiedot&virhe=true&viesti=ei tallentunut');
    } 
 }else header('location: index.php?sivu=omatTiedot&virhe=true&viesti=ei tallentunut');
}
?>