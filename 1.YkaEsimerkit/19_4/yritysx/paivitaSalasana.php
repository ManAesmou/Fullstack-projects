<?php
/**
 *  file:   paivitaSalasana.php
 *  desc:   Päivittää salasanan, mikäli vanha ok ja uusi täyttää vaatimukset
 */
if(empty($_POST)) header('location: index.php?sivu=kirjaudu');
else{
    //tultiin lomakkeelta - > tarkistukset yms
    session_start(); //tarvitaan, koska käytetään esim $_SESSION['userID']-tietoa
    include('dbConnect.php');
    $sql="SELECT Password FROM users WHERE userID=".$_SESSION['userID'];
    $tulos=$conn->query($sql);
    if($tulos->num_rows > 0){
        //löytyi salasana, verrataan tietokannassa olevaa käyttäjän antamaan vanhaan salasanaa
        $salasana=$conn->real_escape_string($_POST['salasana']); //lomakkeen vanha salasana
        $rivi=$tulos->fetch_assoc(); //tietokannassa oleva salasana (kryptattu)
        //vertaillaan edellisiä kryptattuna
        if(password_verify($salasana,$rivi['Password'])){
            //salasanat vastaavat toisiaan (vertailu kryptattuna muotona)
            //tarkistetaan, että uusi salasana 2x kirjoitettu oikein
            $salasana1=$conn->real_escape_string($_POST['salasana1']); //lomakkeen uusi salasana
            $salasana2=$conn->real_escape_string($_POST['salasana2']); //lomakkeen uusi uudestaan
            if($salasana1==$salasana2){
                //uusi 2x samalla tavalla, tarkistetaan vahvuus
                $_SESSION['mikavirhe']=''; //tätä käytetään virheilmoitusten näyttämiseen
                if(password_strength($salasana1)){
                    //salasana oli vaatimusten mukainen -> päivitetään
                    $salasana1=password_hash($salasana1,PASSWORD_DEFAULT); //kryptaa salasanan
                    $sql="UPDATE users SET Password='$salasana1' WHERE userID=".$_SESSION['userID'];
                    if($conn->query($sql)===TRUE){
                        //päivitys onnistui
                        header('location: index.php?sivu=omatTiedot&virhe=false');
                    }else header('location: index.php?sivu=omatTiedot&virhe=yhteys');
                }else header('location: index.php?sivu=omatTiedot&virhe=vahvuus');
            }else header('location: index.php?sivu=omatTiedot&virhe=uusi');
        }else header('location: index.php?sivu=omatTiedot&virhe=nykyinen');
    }else header('location: index.php?sivu=omatTiedot&virhe=EiLoydy');
}

//tässä passwordStrength-funktio
function password_strength($password) {
    $password_length = 8;
	$returnVal = True;  //funktio palauttaa tämän $returnVal arvon (true/false)

	if ( strlen($password) < $password_length ) {
		$returnVal = False;
        $_SESSION['mikavirhe'].="Salasana vähintään $password_length merkkiä! ";
	}

	if ( !preg_match("#[0-9]+#", $password) ) {
		$returnVal = False;
        $_SESSION['mikavirhe'].='Salasana pitää sisältää numeroita! ';
	}

	if ( !preg_match("#[a-z]+#", $password) ) {
		$returnVal = False;
        $_SESSION['mikavirhe'].='Salasanassa tulee olla pieniä kirjaimia! ';
	}

	if ( !preg_match("#[A-Z]+#", $password) ) {
		$returnVal = False;
        $_SESSION['mikavirhe'].='Salasanassa pitää olla isoja kirjaimia! ';
	}

	if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password) ) {
		$returnVal = False;
        $_SESSION['mikavirhe'].='Salasanassa pitää olla erikoismerkkejä!';
	}

	return $returnVal;

}
?>