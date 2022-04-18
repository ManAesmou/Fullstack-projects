<?php
/*
    file:   aloita.php
    desc:   Sovelluksen aloitussivu. Kysytään käyttäjän nimi ja email
            Sovellus tallentaa tiedot cookies-tietoihin ja näyttää tietoja
            sovelluksen jokaisella sivulla
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cookies ja Session esimerkki</title>
    </head>
    <body>
        <h3>Anna nimesi ja sähköpostisi</h3>
        <form action="talletaCookiet.php" method="post">
            Nimi:  <input type="text" name="nimi" required><br>
            Email: <input type="email" name="email" required><br>
            <input type="submit" value="Aloita">
        </form>
    </body>
</html>