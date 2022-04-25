<?php
/* 
    file:          omatTiedot.php
    description:   Näyttää presidentin tietoja. 
*/
require 'includes/dbManagement.php';
?>

<div class="container">
    <div class="row">
        <h3 class="mt-3">Presidentin tiedot</h3>
        <!--Tietokortti-->
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Nimi: <?php echo $row['first_name'].' '.$row['last_name'].' '.$row['suffix'] ?></div>
                <div class="card-body">Kaupunki: <?php echo $row['city']?></div>
                <div class="card-body">Osavaltio: <?php echo $row['state']?></div>
                <div class="card-body">Syntymäpvm: <?php echo $row['birth']?> </div>
                <div class="card-body">Kuolemapvm: <?php echo $row['death']?> </div>
                <div class="card-footer">
                    <?php 
                        if ($firstName <> "") {
                            echo '<a class="btn btn-secondary mx-2" href="index.php?page=change&first_name='.$row['first_name'].'">Muokkaa</a>
                                    <a class="btn btn-danger mx-2" href="index.php?page=delete&first_name='.$row['first_name'].'&presidentID='.$row['presidentID'].'">Poista</a>';
                        } elseif ($lastName <> "") {
                            echo '<a class="btn btn-secondary mx-2" href="index.php?page=change&last_name='.$row['last_name'].'">Muokkaa</a>
                                    <a class="btn btn-danger mx-2" href="index.php?page=delete&last_name='.$row['last_name'].'&presidentID='.$row['presidentID'].'">Poista</a>';
                        }
                    ?>
                    <a href="./index.php?page=all_presidents" class="btn btn-info">Takaisin</a>
                </div>
            </div>
        </div>
    </div>
</div>