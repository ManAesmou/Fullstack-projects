<?php
/**
 *  file:   privateReservation.php
 *  desc:   Haetaan yksityistunti pyyntöjä tietokannasta
 */
?>
<div class="container">
  <h3 class="m-3">There are <?php echo $rowCount; ?> private reservation for you.</h3>
  <div class="container">
    <div class="row d-flex justify-content-center col-md-12 ">
      <table class="table table-striped">
          <thead>
            <tr>
              <th>Customer</th>
              <th>Lesson topic</th>
              <th>Gender</th>
              <th>Belt rank</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
                  //tulostetaan $result-muuttujalta kaikki rivit while-silmukalle
                  while ($row = $result->fetch_assoc()) {  // or foreach ($result as $row) 
                      echo '<tr class"w-50">';
                      echo '<td>'.$row['nimi'].'</td>';
                      echo '<td>'.$row['oppituntiaihe'].'</td>';
                      echo '<td>'.$row['sukupuoli'].'</td>';
                      echo '<td>'.$row['vyoarvo'].'</td>';
                      echo '<td><a class="btn btn-success" href="index.php?page=addBooking&id='. $row['varausID'].'" id="addBooking">Add booking</a></td>';
                      echo '<td><a class="btn btn-danger" href="index.php?page=deleteReservation&first_name='.$row['nimi'].'">Delete</a></td>';
                    // data-bs-toggle="modal" data-bs-target="#frmBooking"
                    //echo '<input type="hidden" name="varausID" value=" ">';
                      echo '</tr>';
                  }
                $conn->close(); //hävittää yhteyden tiedot palvelimen muistista
                //echo '<td><a class="btn btn-success" href="index.php?page=lessonBooking&first_name='.$row['nimi'].'">Accept</a></td>';
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

