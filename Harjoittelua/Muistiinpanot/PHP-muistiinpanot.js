/*

Basic PHP Syntax
A PHP script can be placed anywhere in the document.

A PHP script starts with <?php and ends with ?>:

<?php
   PHP code goes here
?>


?> MUUTTUJAT <?
PHP ei ole kirjainkoolla huomioitava, eli voi kirjoittaa ECHO, echo, EcHo. Kaikki muuttujat ovat kirjainkoolla huomioitavia. 

PHP muuttuja alotetaan $-merkillä.

PHP:ssa ei voi kutsua Globaalisti perustettua muuttujaa funktion sisäpuolelta suoraan, vaan siihen pitää käyttää global-avainsanaa ennen muuttujaa. Esim. 
  <?php
  $x = 5;
  $y = 10;

  function myTest() {
    global $x, $y;
    $y = $x + $y;
  }

  myTest();
  echo $y; // outputs 15
  ?>

Globaaleja muuttujia voidaan kutsua myös $GLOBALS['y'], $GLOBALS['x']

PSP:ssa, kuten muissakin kielissä, funktion sisällä julistetut muuttujat ovat paikallisia muuttujia (LOCAL).

Normaalisti kun funktio on käytetty, sen sisältämät muuttujan nollaantuvat.
Funktiolle voi kuitenkin merkitä muuttumattoman muuttujan (static) seuraavasti: "static $x = 0", joka pysyy muuttumattomana funktion kutsusta toiseen, eli siihen voidaan esimerkiksi lisätä aina 1 ja se kasvaa aina funktiota kutsuttaessa.  

?> VAKIOMUUTTUJA <?
Vakiomuuttuja (Constant) on kuten muuttuja, paitsi sitä ei voi määrittelyn jälkeen enää muuttaa jälkeenpäin.
Vakiomuuttuja alkaa joko alaviivalla tai kirjaimella.

Näiden luomisessa käytetään define()-funktiota:
  Syntax
  define(name, value, case-insensitive)

  Parameters:
      name: Specifies the name of the constant
      value: Specifies the value of the constant
      case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false

Jos haluat, että ei ole kirjainkoolla huomioitava (oletusarvo on false):
  <?php
  define("GREETING", "Welcome to W3Schools.com!", true);
  echo greeting;
  ?>

Voit luoda vakiojoukon käyttäen define()-funktiota:
  <?php
  define("cars", [
    "Alfa Romeo",
    "BMW",
    "Toyota"
  ]);
  echo cars[0];
  ?>

Vakiomuuttujat ovat automaattisesti globaaleja muuttujia, joita voidaan käyttää missä vain:
<?php
define("GREETING", "Welcome to W3Schools.com!");

function myTest() {
  echo GREETING;
}
 
myTest(); //answer => Welcome to W3Schools.com!
?>

?> ECHO JA PRINT <?
PHP:ssa voidaan ulostulona tai tulosteena käytttää echo- ja print-käskyjä.

Näiden erona on 2 toimintoa: 
- echo ei sisällä palautusarvoa ja print sisältää palautusarvona numeron 1.
- echo voi ottaa sisäänsä monta argumenttia ja print vain yhden.

Echoa-julkilausumaa voidaan käyttää sulkeilla tai ilman (echo tai echo()).
Echo voi sisältää HTML-merkintöjä (echo "<h2>PHP is Fun!</h2>";), normaali merkintä (echo "Hello world!<br>";) tai monta tekstiosaa (echo "This ", "string ", "was ", "made ", "with multiple parameters.";) .

Echo:ssa voidaan myös käyttää muuttujia tekstinosana: 
  <?php
  $txt1 = "Learn PHP";
  $txt2 = "W3Schools.com";
  $x = 5;
  $y = 4;

  echo "<h2>" . $txt1 . "</h2>";
  echo "Study PHP at " . $txt2 . "<br>";
  echo $x + $y;
  ?>

Myös print-julkilausumaa voidaan käyttää sulkeilla tai ilman (print tai print()).
Print myös voi käyttää HTML-merkintöjä.

  <?php
  $txt1 = "Learn PHP";
  $txt2 = "W3Schools.com";
  $x = 5;
  $y = 4;

  print "<h2>" . $txt1 . "</h2>";
  print "Study PHP at " . $txt2 . "<br>";
  print $x + $y;
  ?>


?> TIETOTYYPIT <?
Muuttujiin voidaan tallentaa erilaisia tietotyyppejä:
- String
- Integer
- Float (floating point numbers - also called double)
- Boolean
- Array
- Object
- NULL
- Resource

Tietotyypin voi tarkistaa seuraavasti: 
In the following example $x is an integer. The PHP var_dump() function returns the data type and value:
  Example
  <?php
  $x = 5985;
  var_dump($x);
  ?>


Tekstissä (string) voidaan yksittäistä lainausmerkkiä tai kaksoislainausmerkkejä.

Kokonaisluvuissa (integer) voidaan käyttää positiivisia ja negatiivisia kokonaislukuja (ei pistettä).

desiimaaliluvussa (float) voidaan käyttää desimaalinumeroita (pistettä).

Totuusarvot toimivat, kuten muissakin (true, false).

Joukko (array) voi sisältää lukuisia arvoja yhdessä muuttujassa.

Luokat ja objektit (class, object) ovat olio-ohjelmoinnin kaksi pääosaa: Luokka on objektin malli, ja objekti on luokan esiintymä.

Kun yksittäiset objektit luodaan, ne perivät kaikki luokkansa ominaisuudet ja metodit, mutta jokaisella objektilla on eri arvot niille. Luokkaan luodaan rakenteet objektille construct-funktion (__construct($color, $model, etc)) avulla, jota kutsutaan objektia luodessa. Alla esimerkki:

  <?php
  class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
      $this->color = $color;
      $this->model = $model;
    }
    public function message() {
      return "My car is a " . $this->color . " " . $this->model . "!";
    }
  }

  $myCar = new Car("black", "Volvo");
  echo $myCar -> message();
  echo "<br>";
  $myCar = new Car("red", "Toyota");
  echo $myCar -> message();
  ?>

Tyhjä (null) voidaan käyttää tyhjän arvon määrittämisessä. Muuttujat perustettaessa ovat lähtökohtaisesti arvoltaan NULL. 

?> TEKSTINHALLINTA <?
HUOM! Ensimmäinen merkkijononkohta on 0. (ei 1.)
PHP:n strlen() palauttaa tekstinpituuden:
  <?php
  echo strlen("Hello world!"); // outputs 12
  ?>

PHP:n str_word_count() laskee sanojen lukumäärän:
  <?php
  echo str_word_count("Hello world!"); // outputs 2
  ?>

PHP:n strrev() kääntää tekstin toisinpäin:
  <?php
  echo strrev("Hello world!"); // outputs !dlrow olleH
  ?>

PHP:n strpos() etsii tekstinosan tekstistä:
  <?php
  echo strpos("Hello world!", "world"); // outputs 6
  ?>

PHP:n str_replace() korvaa tekstinosan:
  <?php
  echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
  ?>

?> KOKONAISLUKUJEN- JA NUMEROIDENHALLINTA <?
PHP:ssa muuttujan tietotyyppi muuttuu sen mukaan, mitä tietoa siihen tallennetaan. Jos tallennat kokonaisluvun, muuttujan tietotyyppi on integer, ja jos tallennat tekstin, tietotyyppi on string.
Automaattinen tietotypppimuuttaminen saattaa joskus aiheuttaa virheitä.

Voit tarkistaa, onko arvo kokonaisluku:
  <?php
  $x = 5985;
  var_dump(is_int($x));

  $x = 59.85;
  var_dump(is_int($x));
  ?>

Voit tarkistaa, onko arvo desimaaliluku:
  <?php
  $x = 10.365;
  var_dump(is_float($x));
  ?>

Voit tarkistaa, onko arvo rajallinen vai ääretön:
  <?php
  /// Check if a numeric value is finite or infinite 
  $x = 1.9e411;
  var_dump($x);
  ?>  

Voit tarkistaa, onko arvo "ei numero" (NaN):
<?php
$x = acos(8);
var_dump(is_nan($x));
?>

Voit tarkistaa, onko arvo numero tai tekstinumero:
  <?php
  /// Check if the variable is numeric   
  $x = 5985;
  var_dump(is_numeric($x)); // answer bool(true)

  echo "<br>";

  $x = "5985";
  var_dump(is_numeric($x)); // answer bool(true)

  echo "<br>";

  $x = "59.85" + 100;
  var_dump(is_numeric($x)); // answer bool(true)

  echo "<br>";

  $x = "Hello";
  var_dump(is_numeric($x)); // answer bool(false)
  ?>  

Voit muuttaa desimaaliluvun ja tekstin kokonaisluvuksi:
  <?php
  /// Cast float to int
  $x = 23465.768;
  $int_cast = (int)$x;
  echo $int_cast;       // Answer 23465

  echo "<br>";

  /// Cast string to int
  $x = "23465.768";
  $int_cast = (int)$x; 
  echo $int_cast;       // Answer 23465
  ?>

?> PHP MATEMATIIKKAA <?
PHP:ssa voidaan tehdä matemaattisia laskutoimituksia.

Voit käyttää pi() antamaann PI-arvon:
  <?php
  echo(pi()); // returns 3.1415926535898
  ?>

Voit käyttää min() ja max() -funktioita antamaan pienimmän ja suurimman arvon:
  <?php
  echo(min(0, 150, 30, 20, -8, -200));  // returns -200
  echo(max(0, 150, 30, 20, -8, -200));  // returns 150
  ?>

Voit käyttää abs() palauttamaan absoluuttisen arvon (positiivinen):
  <?php
  echo(abs(-6.7));  // returns 6.7
  ?>

Voit käyttää sqrt() antamaan neliöjuuren arvon:
  <?php
  echo(sqrt(64));  // returns 8
  ?>

Voit käyttää round() funktiota pyöristämään desimaalilukuja:
  <?php
  echo(round(0.60));  // returns 1
  echo(round(0.49));  // returns 0
  ?>

Voit käyttää rand() funktiota antamaan satunnaisennumeron:
  <?php
  echo(rand());
  ?>

Voit antaa arvovälin rand()-funktiolle, jos esimerkiksi haluat arvon 10 ja 100 väliltä:
  <?php
  echo(rand(10, 100));
  ?>




*/