<?php
/**
 *  file:   kaikki.php
 *  desc:   Listaa kaikki autot aakkosjärjestyksessä ja tulostaa ne taulukkoon. Tämä sisältö on osa
 *          index.php -sivua, joten tässä on vain tarvittava html-osuus
 */
include('dbConnect.php'); //käyttää tietokantayhteyttä
$sql='SELECT * FROM car ORDER by manufacturer, model, year';  //määritellään SQL-lause merkkijonoksi
//suoritetaan SQL-lause ja palautetaan mahdollinen tulos muuttujalle
$tulos=$conn->query($sql);
$montako=mysqli_num_rows($tulos);
?>
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