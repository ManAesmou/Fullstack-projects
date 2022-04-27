<!-- 
    Tulostetaan yksittäisen presidentin tiedot kortille. 
    Sivustoa hyödynnetään index.php tiedostossa.
-->
<div class="container">
    <div class="row">
        <h3 class="mt-3">User information</h3>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Name: <?php echo $row['etunimi'].' '.$row['sukunimi'] ?></div>
                <div class="card-body">Email: <?php echo $row['email']?></div>
                <div class="card-body">Password: <?php echo $row['salasana']?></div>
                <div class="card-body">Phone: <?php echo $row['puhelin']?> </div>
                <div class="card-body">Permissions: <?php echo $row['kayttooikeudet']?> </div>
                <div class="card-body">Registration date: <?php echo $row['rekisterointipvm']?> </div>
                <div class="card-footer">
                    <a href="./index.php?page=home" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>