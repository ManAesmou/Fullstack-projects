<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document 2</title>
</head>
<body>

<!--POST VS GET 
Jos laitat metodiksi GET, niin arvo tulostuu myös URL:ään. 
Kun käyttää POST, niin arvo ei tulostu url:ään.
-->

<!--<form action="site2.php" method="post">
  Password: <input type="password" placeholder="Syötä salasana" name="password"> <br>
  <input type="submit">
</form>
<br><br>

-->
<?php 
  //echo $_POST['password'];
?>
<br>

<?php 

  //Tässä käyteään joukkoa (array), joka toimii konttina suurelle määrälle tietoa
  //Luodaan muuttuja, joka on joukko ystäviä. 
  $friends = array("Ismo", "Osmo", "Vera", "Milla");
  //Tiedon muuttaminen:
  $friends[1] = "Eemeli";
  echo $friends[1];
  //tarkistetaan, kuinka monta henkilöä joukossa on.
  echo count($friends);
?>
<br>

<!--Using checkboxes
Tässä luon checkboxeilla joukon joka tallennetaan $fruits muuttujaan.
-->
<form action="site2.php" method="get">
  Apples: <input type="checkbox" name="fruits[]" value="apples">
  Bananas: <input type="checkbox" name="fruits[]" value="bananas">
  Oranges: <input type="checkbox" name="fruits[]" value="oranges">
  <input type="submit">
</form>

<?php 
  $fruits = $_GET["fruits"];
  echo $fruits[1]
?>

<br>

<!--Associative Arrays Tässä tallennetaan avainarvoja (Key values)
                Ismo on avain ja 9 on arvo (arvosana).-->
<?php 
  $grades = array("Ismo" => "9", "Eemeli" => "7", "Vera" => "9");
  //Alla olevalla voidaan tulostaa tekstilaatikon (student) tiedon avulla joukon arvosanoja. 
  echo $grades[$_GET["student"]]
 ?>

<br>

 <!--If statement   Kohdassa 2:04:56-->
<?php 
$isMale = true;
$isTall = false;
if ($isMale && $isTall) {
  echo "You are a tall male.";
} elseif ($isMale && !$isTall) {
  echo "You are short male.";
} else {
  echo "You are not male.";
}
?>

<!--Building a better calculator-->
<form action="site2.php" method="post">
  First num: <input type="number" step="0.1" name="num1"> <br>
  OP: <input type="text" name="op"> <br>
  Second num: <input type="number" name="num2"> <br>

  <input type="submit">
</form>

<?php 
  $num1 = $_POST["num1"];
  $num2 = $_POST["num2"];
  $op = $_POST["op"];

  if ($op == "+") {
    echo $num1 + $num2;
  } elseif ($op == "-") {
    echo $num1 - $num2; 
  } elseif ($op == "*") {
    echo $num1 * $num2; 
  } elseif ($op == "/") {
    echo $num1 / $num2; 
  } else {
    echo "Invalid Operator";
  }
?>

<br>
<!--Swtich statements-->
<form action="site2.php" method="post">
  What was your grade?
  <input type="text" name="grade">
  <input type="submit">
</form>

<?php 
  $grade = $_POST["grade"];
  
  switch ($grade) {
    case "A":
      echo "You did amazing!";
      break;
    case "B":
      echo "You did pretty good";
      Break;
    case "C":
      echo "You did poorly";
      Break;
    case "D":
      echo "You did very bad";
      Break;
    case "F":
      echo "You FAIL!";
      Break;
    default:
    echo "Invalid Grade";
  }
?>

<br>
<!--While loop and do while loop-->

<?php 
  $index = 1;
  while($index <= 5) {
    echo "$index <br>";
    $index++;
  }

  $undex = 1;
  do {
    echo "$undex";
    $undex++; 
  } while ($undex <= 3);
?>

<br>
<br>
<!--For loop //Tulostan joukon numeroita.\\-->
<?php 
    $luckyNumbers = array(4, 8 , 16, 23, 44, 88);
    $index = 1;
  for ($i = 0; $i < count($luckyNumbers); $i++) {
    echo "$luckyNumbers[$i] <br>";
  }
?>


</body>
</html>