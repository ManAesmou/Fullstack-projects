<?php
/**
 *  file:   muokkaa.php
 *  desc:   Hakee valitun käyttäjän tiedot lomakkeelle muokattavaksi.
 */
if(isset($_SESSION['user'])){
    //sivu näkyy vain kirjautuneille
    include('dbConnect.php');
    $sql="SELECT * FROM users WHERE Email='".$_GET['email']."'";
    $tulos=$conn->query($sql);
    if($tulos->num_rows > 0){
        $rivi=$tulos->fetch_assoc();
        echo '<h3>Muokkaa käyttäjän '.$rivi['Etunimi'].' '.$rivi['Sukunimi'].' tietoja</h3>';
        echo '<form action="paivitaUser.php" method="post">';
        echo '<input type="hidden" name="userID" value="'.$rivi['userID'].'">';
        echo '  <table class="table table-striped">
                    <tr><th>Etunimi</th><th>Sukunimi</th><th>Puhelin</th>';
        if($_SESSION['userRole']=='admin') echo '<th>Rooli</th>';
        echo        '</tr>
                    <tr>
                        <td><input type="text" name="etunimi" value="'.$rivi['Etunimi'].'" required></td>
                    
                        <td><input type="text" name="sukunimi" value="'.$rivi['Sukunimi'].'" required></td>
                    
                        <td><input type="text" name="puhelin" value="'.$rivi['Puhelin'].'"></td>';
        if($_SESSION['userRole']=='admin'){           
            echo             '<td><select name="rooli">
                                <option value="user"';
            if($rivi['userRole']=='user') echo ' selected';
            echo                  '>User</option>
                                <option value="admin"';
            if($rivi['userRole']=='admin') echo ' selected';
            echo                   '>Admin</option>
                                </select></td>';
        }         
        echo            '<td><input type="submit" class="btn btn-primary" value="Päivitä"></td>
                    </tr>
                </table>
        ';
        echo '</form>';
    }else echo '<p class="alert alert-info">Ei tietoa</p>';
}
?>