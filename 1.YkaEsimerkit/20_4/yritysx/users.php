<?php
/**
 *  file:   users.php
 *  desc:   Näyttää käyttäjälistan. Admin-roolin käyttäjä voi lisätä uusia.
 */
//näytetään sivu vain kirjautuneille
if(isset($_SESSION['user'])){
 include('dbConnect.php');
 $sql='SELECT userID, Etunimi, Sukunimi, Email FROM users ORDER by Sukunimi, Etunimi';
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
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($rivi=$tulos->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$rivi['Etunimi'].'</td>';
            echo '<td>'.$rivi['Sukunimi'].'</td>';
            echo '<td>'.$rivi['Email'].'</td>';
            if($_SESSION['userRole']=='admin'){
                //admin käyttäjälle muokkauslinkki emailin perusteella (oletus: email ainutkertainen)
                echo '<td><a href="index.php?sivu=muokkaa&email='.$rivi['Email'].'" class="btn btn-secondary">Muokkaa</a> ';
                echo '<a href="poistaUser.php?userID='.$rivi['userID'].'" class="btn btn-secondary">Poista</td>';
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
 <?php
 $conn->close();
}
?>