<?php
/**
 *  file:   privateReservation.php
 *  desc:   Haetaan varauksia tietokannasta
 */
?>

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
                    echo '<td><a class="btn btn-success" href="#" id="login" data-bs-toggle="modal" data-bs-target="#frmKirjaudu">Accept</a></td>';
                    echo '<td><a class="btn btn-danger" href="index.php?page=deleteReservation&first_name='.$row['nimi'].'">Delete</a></td>';
                    echo '</tr>';
                }
              $conn->close(); //hävittää yhteyden tiedot palvelimen muistista
              //echo '<td><a class="btn btn-success" href="index.php?page=lessonBooking&first_name='.$row['nimi'].'">Accept</a></td>';
          ?>
      </tbody>
    </table>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="frmKirjaudu">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Enter the reservation in <br> the lesson booking.</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form id="loginForm">
            <div class="form-group">
              <div class="form-floating my-1 gx-1">
                <textarea class="form-control" placeholder="Enter a description" name="description" id="floatingdescription" style="height: 100px" required></textarea>
                <label for="floatingdescription">Enter a description</label>
              </div>
            </div>

            <div class="form-group">
                <label for="pwd">Enter the date for the private lesson</label>
                <input type="datetime-local" class="form-control" name="pwd" id="pwd" required> 
            </div>
            
          <div id="lgnVirhe"></div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return</button>
          <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
  
      </div>
    </div>
  </div>

