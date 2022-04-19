<?php
/**
 *  file:   omatTiedot.php
 *  desc:   Näyttää käyttäjän tietoja ja salanan vaihtolomakkeen
 */
if(isset($_SESSION['userID'])){
    //käyttäjä on kirjautunut, näytetään sivu
 include('dbConnect.php');
 $sql='SELECT * FROM users WHERE UserID='.$_SESSION['userID'];
 $tulos=$conn->query($sql);
 if($tulos->num_rows > 0){
    //Aluksi riville poimitaan löytyneet tiedot
    $rivi=$tulos->fetch_assoc();
 }
?>
<h3>Omat tiedot</h3>

<div class="row">
    <!--Tietokortti-->
    <div class="col-sm-6">
        <h4>Info</h4>
        <div class="card">
            <div class="card-header"><?php echo $rivi['Etunimi'].' '.$rivi['Sukunimi']?></div>
            <div class="card-body">Email: <?php echo $rivi['Email']?></div>
            <div class="card-footer">Puhelin: <?php echo $rivi['Puhelin']?> </div>
        </div>
    </div>
    <!--Salasanalomake-->
    <div class="col-sm-6">
        <h4>Päivitä salasana</h4>
        <form action="paivitaSalasana.php" method="post">
         <div class="form-group">
            <label for="salasana">Nykyinen salasana:</label>
            <input type="password" class="form-control" placeholder="Salasanasi" name="salasana">
         </div>
         <div class="form-group">
            <label for="salasana1">Uusi salasana:</label>
            <input type="password" class="form-control" placeholder="Uusi salasanasi" name="salasana1">
         </div>
         <div class="form-group">
            <label for="salasana2">Uusi salasana vahvistus:</label>
            <input type="password" class="form-control" placeholder="Uusi salasanasi" name="salasana2">
         </div>
         <button type="submit" class="btn btn-primary">Päivitä</button>
        </form>
        <?php
        if(isset($_SESSION['mikavirhe']) AND $_GET['virhe']<>'false') echo '<p class="alert alert-danger">'.$_SESSION['mikavirhe'].'</p>';
        ?>
    </div>
</div>
<?php
}else{
    //ei ole kirjaunut, tyhjä sivu ja ilmoitus
    echo '<p></p><p class="alert alert-info">Ei tietoja</p>';   
}
?>