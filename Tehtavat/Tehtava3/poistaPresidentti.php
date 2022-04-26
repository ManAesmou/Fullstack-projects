<!--
    Varmistetaan omatTiedot.php kortin tietojen perusteella, haluatko varmasti poistaa valitun presidentin tietokannasta. 
    Sivustoa hyödynnetään index.php tiedostossa.   
-->
<div class="container">
    <div class="row">
        <h3 class="mt-3">Haluatko varmasti poistaa presidentin?</h3>
        <div class="col-md-10">
            <form action="includes/dbManagement.php" method="post">
            <input type="hidden" name="presidenttiId" value="<?php echo $row['presidentID']; ?>">
                <div class="card">
                    <div class="card-header bg-danger bg-opacity-50">Nimi: <?php echo $row['first_name'].' '.$row['last_name'].' '.$row['suffix']; ?></div>
                    <div class="card-body bg-danger bg-opacity-50">Kaupunki: <?php echo $row['city'];?></div>
                    <div class="card-body bg-danger bg-opacity-50">Osavaltio: <?php echo $row['state'];?></div>
                    <div class="card-body bg-danger bg-opacity-50">Syntymäpvm: <?php echo $row['birth'];?> </div>
                    <div class="card-body bg-danger bg-opacity-50">Kuolemapvm: <?php echo $row['death'];?> </div>
                    <div class="card-footer bg-danger bg-opacity-50">
                        <button type="submit" name="poistaPresidentti" class="btn btn-danger mx-3">Vahvista poista</button>
                        <?php 
                            if ($firstName <> "") {
                                echo '<a href="./index.php?page=data&first_name='.$row['first_name'].'" class="btn btn-info">Peruuta</a>';
                            } elseif ($lastName <> "") {
                                echo '<a href="./index.php?page=data&last_name='.$row['last_name'].'" class="btn btn-info">Peruuta</a>';
                            }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>