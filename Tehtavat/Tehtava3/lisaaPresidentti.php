<!-- 
    Luodaan lomake, jolla voidaan lisätä presidentti tietokantaan. 
    Sivustoa hyödynnetään index.php tiedostossa.
-->
<div class="container">
    <h3 class="my-3">Lisää presidentti</h3>
    <h5>Pakolliset kentät merkitty *</h5>
    <form action="includes/dbManagement.php" method="post">
        <div class="row">
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="text" class="form-control" name="etunimi" id="floatingFirstname" placeholder="Etunimi*" required>
                <label for="floatingFirstname">Etunimi*</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="text" class="form-control" name="sukunimi" id="floatingLastname" placeholder="Sukunimi*" required>
                <label for="floatingLastname">Sukunimi*</label>
            </div>
            <div class="form-floating col-md-2 my-1 gx-1">
                <input type="text" class="form-control" name="paate" id="floatingSuffix" placeholder="Paate">
                <label for="floatingSuffix">Pääte</label>
            </div>  
        </div>
        <div class="row">
            <div class="form-floating col-lg-3 my-1 gx-1">
                <input type="text" class="form-control" name="kaupunki" id="floatingCity" placeholder="Kaupunki*" required>
                <label for="floatingCity">Kaupunki*</label>
            </div>
            <div class="form-floating col-lg-2 my-1 gx-1">
                <input type="text" class="form-control" name="osavaltio" id="floatingState" placeholder="Osavaltio* (XX)" pattern="[A-Z]{2}" required>
                <label for="floatingState">Osavaltio* (XX)</label>
            </div>  
        </div>
        <div class="row">
        <div class="col-lg-3 my-2">
                <label for="inputSyntymapvm" class="form-label">Syntymäpvm*</label>
                <input type="date" class="form-control" name="syntymapvm" id="inputSyntymapvm" required>
            </div>
            <div class="col-lg-3 my-2">
                <label for="inputKuolemapvm" class="form-label">Kuolemapvm)</label>
                <input type="date" class="form-control" name="kuolemapvm" id="inputKuolemapvm">
            </div>
        </div>
        <button type="submit" class="btn btn-success m-2" name="laheta">Tallenna</button>
        <a href="./index.php?page=all_presidents" class="btn btn-info">Takaisin</a>
    </form>
</div>