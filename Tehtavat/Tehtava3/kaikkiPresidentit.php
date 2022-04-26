<!-- 
  Luodaan taulukko, jolle tulostetaan tietokannan presidentti-taulusta haetut dtiedot jokaista presidenttiä kohden omalle riville. 
  Sivustoa hyödynnetään index.php tiedostossa.
-->
<div class="container">
<h3 class="my-3">Yhdysvaltojen presidentit (<?php echo $rowCount; ?> kpl).</h3>
  <div class="row d-flex justify-content-center col-md-12">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Etunimi</th>
            <th>Sukunimi</th>
            <th>Syntymäpvm</th>
        </thead>
        <tbody>
          <?php
            //tulostetaan kaikki rivitiedot while-silmukalla tietosolulle. 
            while($row = $result->fetch_assoc()){
              echo '<tr>';
              echo '<td><a href="index.php?page=data&first_name='.$row['first_name'].'" class="text-decoration-none">'.$row['first_name'].'</a></td>';
              echo '<td><a href="index.php?page=data&last_name='.$row['last_name'].'" class="text-decoration-none">'.$row['last_name'].'</a></td>';
              echo '<td>'.$row['birth'].'</td>';
              echo '</tr>';
          }
          $conn->close();
          ?>
      </tbody>
    </table>
  </div>
</div>