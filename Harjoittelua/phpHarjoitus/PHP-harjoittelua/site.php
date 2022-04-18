<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

    <?php
    //! BASICS !//
    //Basic of variables:
    // $characterName = "John";
    // $characerAge = 35;

    //   echo "There once was a man named $characterName. <br>";
    //   echo "He was $characerAge old. <br>";
    //   echo "He really liked the name $characterName. <br>";
    //   echo "But didn't like being $characerAge. <br>";

    //Basic Data types:
    // $phrase = "To be or not to be";
    // $age = 30;
    // $gpa = 32.81374;
    // $isMale = false;
    
    //Working with strings:
    //String functions (kirjoitetaan nimi pienellä).
    // $nimi = 'Ismo Manninen';
    // echo strtolower($nimi);

    //Paikataan uudella sanalla:
    // $nimi = 'Ismo Manninen';
    // echo str_replace('Ismo', 'Osmo', $nimi);

    //Getting user input:
    ?>

<!--Kun tehdään lomaketta, halutaan syöttää action kohtaan sivusto: -->
<form action="site.php" method="get">
  <!--Syötölle annetaan tyyppi ja nimi -->
  Name: <input type="text" name="name">
  <!--Submit toimii hyväksymisenä-->
  <br>
  age: <input type="number" name="age">
  <input type="submit">
</form>
<?php
//Tässä haluan tulostaa ulos nimen.
echo $_GET["name"] ?>
<?php echo $_GET["age"] ?>  
<br>
<br>

<!--Building basic calculator -->
<form action="site.php" method="get">
  <input type="number" name="num1">
  <br>
  <input type="number" name="num2">
  <input type="submit">
</form>

Answer:<?php echo $_GET['num1'] + $_GET['num2'] ?>
<br>

<!--Building a mad libs game-->
<form action="site.php" method="get">
    Color: <input  type="text" name="color"> <br>
    Plural noun: <input  type="text" name="pluralNoun"> <br>
    Celebrity: <input  type="text" name="celebrity"> <br>
    <input type="submit">
</form>
<br><br>

<?php 
  $color = $_GET['color'];
  $pluralNoun = $_GET['pluralNoun'];
  $celebrity = $_GET['celebrity'];
  echo  "Roses are $color <br>";
  echo  "$pluralNoun is blue <br>";
  echo  "I love $celebrity <br>";
?>




</body>
</html>