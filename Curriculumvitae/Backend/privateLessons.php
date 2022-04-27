<?php
/**
 *  file:   home-page.php
 *  desc:   Haetaan asiakkaita tietokannasta
 */
?>

<h3 class="m-3">There are <?php echo $rowCount; ?> private reservation for you.</h3>
<div class="container">
  <div class="row d-flex justify-content-center col-md-12">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Lesson topic</th>
            <th>Gender</th>
            <th>Belt rank</th>
          </tr>
        </thead>
        <tbody>
          <?php
                //tulostetaan $result-muuttujalta kaikki rivit while-silmukalle
                while ($row = $result->fetch_assoc()) {  // or foreach ($result as $row) 
                    echo '<tr>';
                    echo '<td>'.$row['nimi'].'</td>';
                    echo '<td>'.$row['email'].'</td>';
                    echo '<td>'.$row['puhelin'].'</td>';
                    echo '<td>'.$row['oppituntiaihe'].'</td>';
                    echo '<td>'.$row['sukupuoli'].'</td>';
                    echo '<td>'.$row['vyoarvo'].'</td>';
                    // echo '<td>'.number_format($row['price'], 0).'</td>';
                    echo '</tr>';
                }
              $conn->close(); //hävittää yhteyden tiedot palvelimen muistista
          ?>
      </tbody>
    </table>
  </div>
</div>

