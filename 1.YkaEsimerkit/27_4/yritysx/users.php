<?php
/**
 *  file:   users.php
 *  desc:   Näyttää käyttäjälistan. Admin-roolin käyttäjä voi lisätä uusia.
 */
//näytetään sivu vain kirjautuneille
if(isset($_SESSION['user'])){
  include('dbConnect.php');
 //pagination eli sivutukseen liittyvää tietoa
 if(isset($_GET['start'])) $start=$_GET['start'];else $start=0;
 $montako=3; //kolme riviä per sivu
 //tarkistetaan, montako riviä tietokannassa on
 $sql='SELECT count(userID) as Lkm FROM users';
 $tulos=$conn->query($sql);
 $rivi=$tulos->fetch_assoc();
 $lkm=$rivi['Lkm']; //montako riviä tietokannan taulussa on
 $sivuja=ceil($lkm / $montako);
 if($start+$montako>=$lkm) $seuraava=$start; else $seuraava=$start+$montako;
 if($start>0) $edellinen=$start-$montako;else $edellinen=0;
 //sitten tietokantakysely
 $sql="SELECT userID, Etunimi, Sukunimi, Email, profiilikuva 
        FROM users ORDER by Sukunimi, Etunimi
        LIMIT $start, $montako";
 $tulos=$conn->query($sql);
  ?>
 <h3>Käyttäjät tietokannassa</h3>
 <?php
 if($_SESSION['userRole']=='admin'){
    //admin käyttäjä saa lisätä -> lomake
    ?>
    <form action="lisaaUser.php" method="post">
    <table class="table table-striped">
     <thead>
      <tr>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Email</th>
        <th>Rooli</th>
      </tr>
     </thead>
     <tbody>
            <tr><td><input type="text" name="etunimi" required></td>
                <td><input type="text" name="sukunimi" required></td>
                <td><input type="email" name="email" required></td>
                <td><select name="rooli">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select></td>
                <td><input type="submit" value="Lisää" class="btn btn-secondary"></td>
            </tr>
     </tbody>
    </table>
    </form>
    <?php
 }

 ?>
 <ul class="pagination">
  <li class="page-item">
    <a class="page-link" href="index.php?sivu=users&start=<?php echo $edellinen?>">Edellinen sivu</a>
  </li>
  <?php
  //sivutuslinkit tässä
  $sivunro=0;
  for($i=1;$i<=$sivuja;$i++){
    echo '<li class="page-item ';
    if($start==$sivunro) echo 'active';
    echo '"><a class="page-link" href="index.php?sivu=users&start='.$sivunro.'">';
    echo $i.'</a></li>';
    $sivunro=$sivunro+$montako;
  }
  ?>
  <li class="page-item">
    <a class="page-link" href="index.php?sivu=users&start=<?php echo $seuraava?>">Seuraava sivu</a>
  </li>
</ul>
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Email</th>
        <th>Kuva</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($rivi=$tulos->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$rivi['Etunimi'].'</td>';
            echo '<td>'.$rivi['Sukunimi'].'</td>';
            echo '<td>'.$rivi['Email'].'</td>';
            if($rivi['profiilikuva']!=''){
            echo '<td><img src="images/profiilikuvat/'.$rivi['profiilikuva'].'" class="img-thumbnail" width="50" alt="Profiilikuva"></td>';
            }else echo '<td></td>';
            if($_SESSION['userRole']=='admin'){
                //admin käyttäjälle muokkauslinkki emailin perusteella (oletus: email ainutkertainen)
                echo '<td><a href="index.php?sivu=muokkaa&email='.$rivi['Email'].'" class="btn btn-secondary">Muokkaa</a> ';
                echo ' <a href="poistaUser.php?userID='.$rivi['userID'].'" class="btn btn-secondary">Poista</a> ';
                echo ' <a href="uusiSalasana.php?email='.$rivi['Email'].'" class="btn btn-secondary">Uusi salasana</a></td>';
            }else{
                //user-tason käyttäjälle omien tietojen muokkaus
                if($_SESSION['userID']==$rivi['userID']){
                  echo '<td><a href="index.php?sivu=muokkaa&email='.$rivi['Email'].'" class="btn btn-secondary">Muokkaa</a> ';
                }else echo '<td></td>';
            }
            echo '</tr>';
        }
      ?>
    </tbody>
 </table>
 <p><a href="usersPDF.php" target="_blank">Käyttäjälista PDF-tiedostona</a></p>
 <?php
  $conn->close();
}
?>