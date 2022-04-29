<?php
/**
 *  file:   uusiSalasana.php
 *  desc:   Generoi uuden salasanan ja lähettää sen emaililla käyttäjälle. Oikeasti myös
 *          päivittäisi tietokantaan uuden salasanan
 */
if(empty($_GET['email'])) header('location: index.php?sivu=users');
else{
    $email=$_GET['email'];
    if(!empty($_GET['vahvista'])){
        //salasanan vaihto on vahvistettu
        include('dbConnect.php');
        $sql="SELECT Email FROM users WHERE Email='$email'";
        $tulos=$conn->query($sql);
        if($tulos->num_rows > 0){
            //voidaan päivittää
            $length = 10;
            $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
            $salasana=password_hash($randomString,PASSWORD_DEFAULT);
            $sql="UPDATE users SET Password='$salasana' WHERE Email='$email'";
            if($conn->query($sql)===TRUE){
                //onnistui, sähköposti käyttäjälle
                $to=$email;
                $subject='YritysX - Sovelluksen salasanasi on päivitetty';
                $teksti='Hei!\r\n';
                $teksti.='Uusi salasanasi on: '.$randomString.'\r\n';
                $teksti.='Älä vastaa tähän viestiin!\r\n';
                $headers='From: webapp@yritysx.com \r\n CC:yk@gmail.com';
                mail($to,$subject,$teksti,$headers); //TÄMÄ EI TOIMI LOCALHOSTILLA!!!!
                //header('location: index.php?sivu=users');
                echo '<p>Salasana:'.$randomString.'</p>';
                echo '<p><a href="index.php?sivu=users">Takaisin</a></p>';
            }
        }else header('location: index.php?sivu=users');
    }else{
        //kysytään varmistus
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>YritysX - Etusivu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head><body>
<div class="container">
    <h3>Olet resetoimassa käyttäjän <?php echo $email?> salasanaa</h3>
    <p>Haluatko jatkaa?</p>
    <p><a href="uusiSalasana.php?email=<?php echo $email?>&vahvista=ok">Kyllä</a> 
       <a href="index.php?sivu=users">Peruuta</a></p>
</div>
</body>
</html>
    <?php
    }
}
?>