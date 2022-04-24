<?php
/**
 *  file:   muokkaaPresidentti.php
 *  desc:   Hakee valitun presidentin tiedot lomakkeelle muokattavaksi ja päivittää ne presidenttiID:n perusteela.
 */
require_once 'includes/dbManagement.php';

if ($row > 0) {
    echo '
<div class="container">
<div class="row">
<h3 class="mt-3">Muokkaa presidenttiä '.$row['first_name'].' '.$row['last_name'].'</h3>
    <!--Tietokortti-->
    <div class="col-md-10">
        <form action="includes/dbManagement.php" method="post">
        <input type="hidden" name="presidenttiId" value="'.$row['presidentID'].'">
        <div class="card">
            <div class="card-header">   
                Etunimi* <input type="text" name="etunimi" value="'.$row['first_name'].'" required> 
                Sukunimi* <input type="text" name="sukunimi" value="'.$row['last_name'].'" required> 
                Pääte <input type="text" name="paate" value="'.$row['suffix'].'">
            </div>
            <div class="card-body">Kaupunki* <input type="text" name="kaupunki" value="'.$row['city'].'" required></div>
            <div class="card-body">Osavaltio* <input type="text" name="osavaltio" value="'.$row['state'].'" required></div>
            <div class="card-body">Syntymäpvm* <input type="text" name="syntymapvm" value="'.$row['birth'].'" required></div>
            <div class="card-body">Kuolemapvm: <input type="text" name="kuolemanpvm" value="'.$row['death'].'"></div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success m-2 w-25" name="lahetaMuokkaus">Tallenna</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>';
} else {
        echo '<p class="alert alert-warning">Ei tietoa</p>';
    }
?>