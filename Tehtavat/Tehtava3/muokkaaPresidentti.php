<?php
/**
 *  file:   muokkaaPresidentti.php
 *  desc:   Hakee valitun presidentin tiedot lomakkeelle muokattavaksi ja päivittää ne presidenttiID:n perusteela.
 */
require 'includes/dbManagement.php';

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
                        <div class="d-lg-inline">Etunimi* <input type="text" name="etunimi" value="'.$row['first_name'].'" required></div>
                        <div class="d-lg-inline">Sukunimi* <input type="text" name="sukunimi" value="'.$row['last_name'].'" required></div>
                        <div class="d-inline">Pääte <input type="text" name="paate" value="'.$row['suffix'].'"></div>
                    </div>
                    <div class="card-body">Kaupunki* <input type="text" name="kaupunki" value="'.$row['city'].'" required></div>
                    <div class="card-body">Osavaltio* <input type="text" name="osavaltio" value="'.$row['state'].'" required></div>
                    <div class="card-body">Syntymäpvm* <input type="date" name="syntymapvm" value="'.$row['birth'].'" required></div>
                    <div class="card-body">Kuolemapvm: <input type="date" name="kuolemanpvm" value="'.$row['death'].'"></div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mx-3" name="lahetaMuokkaus">Tallenna</button>
                        '; if ($firstName <> "") {
                            echo '<a href="./index.php?page=data&first_name='.$firstName.'" class="btn btn-info ">Takaisin</a>';
                        } elseif ($lastName <> "") {
                            echo '<a href="./index.php?page=data&last_name='.$lastName.'" class="btn btn-info ">Takaisin</a>';
                        }
                        echo '
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>';
} else {
        echo '<p class="alert alert-warning">No data</p>';
    }
?>

