<?php
/**
 *  file:   kirjaudu.php
 *  desc:   Kirjautumislomake
 */
?>
<div class="container mt-3">
  <h2>Kirjaudu sisään</h2>
  <form action="login.php" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Kirjoita email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Salasana" name="pwd" reruired>
    </div>
    
    <button type="submit" class="btn btn-primary">Kirjaudu</button>
  </form>
  <p></p>
  <?php
  /**
   * Tässä virheilmoitukset kirjautumiseen liittyen
   */
  if(isset($_GET['virhe'])) $virhe = $_GET['virhe'];else $virhe='';
  if($virhe=='email') echo '<p class="alert alert-danger">Email oli väärä!</p>';
  if($virhe=='salasana') echo '<p class="alert alert-danger">Salasana väärin!</p>';
  ?>
</div>