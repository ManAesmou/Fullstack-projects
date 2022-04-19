<?php
/**
 *  file:   login.php
 *  desc:   Tarkistaa, onko käyttäjän salasana oikein verrattuna tietokannasta emailin perusteella löytyvvään.
 *          Emailin avulla haetaan myös userID, Etunimi ja Sukunimi - näytetään sivulla, kun kirjatuminen ok 
 */
if(empty($_POST)) header('location: index.php?sivu=kirjaudu');
else{
    include('dbConnect.php'); //tietokantayhteys käyttöön
    //luetaan lomakkeen kentät
    $email=$conn->real_escape_string($_POST['email']);  //poistaa ei sallitut merkit
    $salasana=$conn->real_escape_string($_POST['pwd']); 
    //sql-lause
    $sql="SELECT Password, userID, Etunimi, Sukunimi, userRole FROM users WHERE Email='$email'";
    //suoritetaan sql-lause
    $tulos=$conn->query($sql);
    //tutkitaan löytyikö tietoja Emailin perusteella
    if($tulos->num_rows > 0){
        //löytyi vähintään yksi rivi (email vain yhden kerran tietokannassa oletus!)
        $rivi=$tulos->fetch_assoc(); //poimitaan löytynyt rivi $rivi-arraylle
        //verrataan salasanoja kryptattuina keskenään
        if(password_verify($salasana,$rivi['Password'])){
            //salasana oli oikein
            session_start();
            $_SESSION['user']=$rivi['Etunimi'].' '.$rivi['Sukunimi'];
            $_SESSION['userID']=$rivi['userID'];
            $_SESSION['userRole']=$rivi['userRole']; //käyttäjän rooli talteen
            header('location: index.php');
        }else{
            //salasana väärin
            header('location: index.php?sivu=kirjaudu&virhe=salasana');
        }
    }else{
        //email ei löytynyt tietokannasta
        header('location: index.php?sivu=kirjaudu&virhe=email');
    }
}
?>