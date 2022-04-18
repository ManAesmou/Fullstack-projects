<?php
/**
 *  file:   haku.php
 *  desc:   Haetaan autoja tietokannasta hakusanan perusteella
 */
if(!empty($_GET['hakusana'])) $hakusana=$_GET['hakusana']; else $hakusana='%%';
include('dbConnect.php');
$sql="SELECT * FROM car 
        WHERE manufacturer like '$hakusana%%'
        OR model like '%%$hakusana%%'
        ORDER by manufacturer, model, year";
$tulos=$conn->query($sql);
$montako=mysqli_num_rows($tulos);
?>
<h3>Hae autoja kirjoittamalla hakusana</h3>
<form action="index.php" method="get">
  <input type="hidden" name="sivu" value="haku">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Hakusana" name="hakusana">
      <input type="submit" class="btn btn-primary" value="Hae">
    </div>
  </div>
</form>

<h3>Autot tietokannassa (<?php echo $montako ?>kpl)</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Merkki</th>
        <th>Malli</th>
        <th>vm</th>
        <th>km</th>
        <th>Hinta</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //tulostetaan $tulos-muuttujalta kaikki rivit while-silmukalle
      while($rivi=$tulos->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$rivi['manufacturer'].'</td>';
          echo '<td>'.$rivi['model'].'</td>';
          echo '<td>'.$rivi['year'].'</td>';
          echo '<td>'.$rivi['km'].'</td>';
          echo '<td>'.number_format($rivi['price'],0).'€</td>';
          echo '</tr>';
      }
      $conn->close(); //hävittää yhteyden tiedot palvelimen muistista
      ?>
    </tbody>
  </table>