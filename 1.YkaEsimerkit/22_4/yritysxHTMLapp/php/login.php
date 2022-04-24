<?php
/**
 *  file:   login.php
 *  desc:   Tarkistaa, onko käyttäjän salasana oikein verrattuna tietokannasta emailin perusteella löytyvvään.
 *          Emailin avulla haetaan myös userID, Etunimi ja Sukunimi - näytetään sivulla, kun kirjatuminen ok.
 *          Palauttaa vastaukset kutsuvalle ohjelmalle JSON-muodossa 
 */
header('Access-Control-Allow-Origin: *');  //mahdollistaa kutsun eri verkko-osoitteista
if(empty($_POST)) echo '{"Status":"Virhe", "Viesti":"Virheellinen sivunpyyntö!"}';
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
            //salasana oli oikein - > palautetaan JSON-muodossa user ja userid
            $user=$rivi['Etunimi'].' '.$rivi['Sukunimi'];
            $userid=$rivi['userID'];
            echo '{"Status":"OK", "Kayttaja":"'.$user.'", "UserID":"'.$userid.'"}';
        }else{
            //salasana väärin
            echo '{"Status":"Virhe","Viesti":"Salasana väärin!"}';
        }
    }else{
        //email ei löytynyt tietokannasta
        echo '{"Status":"Virhe","Viesti":"Email ei löydy!"}';
    }
}
?>